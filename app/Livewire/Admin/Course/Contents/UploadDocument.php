<?php

namespace App\Livewire\Admin\Course\Contents;

use App\Models\Admin\Course\ModuleContent;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class UploadDocument extends Component
{
    use WithFileUploads;

    public $uploadDocument;
    public $module;
    public $content;
    public $id;
    public $Document;
    public $rules;
    public $code;
    public $documents = array();

    public function mount($id)
    {
        if ($id) {
            $this->id = $id;
            $this->content = ModuleContent::find($id);
            $this->code = $this->content->code;
            $this->module = $this->content->module->id;
        }
    }
    public function render()
    {
        if (Storage::exists('public/modules/' . $this->module . '/content/' . $this->id . '/uploads')) {
            // Obtenha todos os arquivos na pasta
            if (count(Storage::allFiles('public/modules/' . $this->module . '/content/' . $this->id . '/uploads')) > 0) {
                $documents = Storage::files('public/modules/' . $this->module . '/content/' . $this->id . '/uploads');
                foreach ($documents as $value) {
                    $val = explode('/', $value);
                    $names = explode('.', $val[6]);
                    $reversed = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $names[0]);

                    // Capitalizar as palavras
                    $reversed = ucwords($reversed);
                    $docs[] = [
                        'name' => $reversed,
                        'ext' => $names[1],
                        'path' => $value,
                    ];
                }
            $this->documents = json_encode($docs);
            }else{
                $this->documents = false;
            }

        } else {
            $this->documents = false;
        }
        return view('livewire.admin.courses.contents.upload-document');
    }
    public function changeDocument()
    {
        $this->dispatch('submitForm');
    }
    public function updated($property)
    {
        if ($property === 'uploadDocument') {
            $this->rules = [
                'uploadDocument'   => ['nullable', 'mimes:pdf,xlsx,docx,pptx,ppt,xlx,csv,doc,txt', 'max:10240'],
            ];

            $this->validate();
            if (isset($this->uploadDocument)) {
                if (Storage::directoryMissing('public/modules/' . $this->module . '/content/' . $this->id . '/uploads')) {
                    // Obtenha todos os arquivos na pasta
                    $this->documents = Storage::files('public/modules/' . $this->module . '/content/' . $this->id . '/uploads');
                }

                $ext = $this->uploadDocument->getClientOriginalExtension();
                $fileNameWithoutExtension = pathinfo($this->uploadDocument->getClientOriginalName(), PATHINFO_FILENAME);
                $new_name = Str::slug($fileNameWithoutExtension, '+') . '.' . $ext;
                $this->uploadDocument->storeAs('public/modules/' . $this->module . '/content/' . $this->id . '/uploads', $new_name);
                $this->openAlert('success', 'Arquivo validada com sucesso.');
            }
        }
    }
    public function excluirTemp()
    {
        $this->uploadDocument = '';
    }

    public function deleteDocs($path)
    {
        Storage::delete($path);
        $this->openAlert('success', 'Arquivo excluido com sucesso.');
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
