<?php

namespace App\Livewire\User\Courses;

use App\Models\Apps\Course\HistoryDownload;
use App\Models\Apps\Course\MyContent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DownloadDocuments extends Component
{
    public $document;
    public $content;
    public $check;
    public $history = false;

    public function mount($document)
    {
        $this->document = $document;
        $this->content = MyContent::find($document->content);
    }
    public function render()
    {
        $this->check = HistoryDownload::where('content_id',$this->content->id)
            ->where('user_id',Auth::user()->id)
            ->where('path',$this->document->path)
            ->first();
        if ($this->check) {
            $this->history = true;
        } else {
            $this->history = false;
        }

        return view('livewire.user.courses.download-documents');
    }
    public function download()
    {
        $this->history = HistoryDownload::create([
            'path'          => $this->document->path,
            'course_id'     => $this->content->module->course_id,
            'module_id'     => $this->content->module_id,
            'content_id'    => $this->content->id,
            'user_id'       => Auth::user()->id,
        ]);
        $headers = [
            'Content-Description' => 'Atrator concursos',
            'Origin'=> 'https://atratorconcursos.com.br/',
        ];
        // dd($headers);
        return Storage::download(
            $this->document->path,
            $this->document->name,
            $headers,
            );
    }
    public function changeCheck()
    {
        if ($this->content->id) {
            $content = MyContent::find($this->content->id);
            if($this->check != null){
                $this->check->delete();
            }else{
                HistoryDownload::create([
                    'path'          => $this->document->path,
                    'course_id'     => $this->content->module->course_id,
                    'module_id'     => $this->content->module_id,
                    'content_id'    => $this->content->id,
                    'user_id'       => Auth::user()->id,
                ]);
            }
        }
        $this->dispatch('check');

    }
}
