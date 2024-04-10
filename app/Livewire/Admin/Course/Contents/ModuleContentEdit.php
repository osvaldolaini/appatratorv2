<?php

namespace App\Livewire\Admin\Course\Contents;

use App\Models\Admin\Course\Module;
use App\Models\Admin\Course\ModuleContent;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class ModuleContentEdit extends Component
{
    public $breadcrumb;
    public $subTitle;
    public $rules;

    public $title;
    public $youtube_link;
    public $description;
    public $type = 1;
    public $type_content;
    public $course_id;
    public $id;

    public function mount(ModuleContent $moduleContent)
    {
        $this->id = $moduleContent->id;
        $this->title = $moduleContent->title;
        $this->youtube_link = $moduleContent->youtube_link;
        $this->description = $moduleContent->description;
        $this->type = $moduleContent->type;
        $this->type_content = $moduleContent->type_content;
        $this->breadcrumb= $moduleContent->module->course->title;
        $this->subTitle = $moduleContent->module->title;
        $this->course_id = $moduleContent->module->course->id;
    }
    public function back()
    {
        redirect()->route('module',$this->course_id);
    }
    public function render()
    {
        return view('livewire.admin.courses.contents.edit');
    }
    public function create()
    {
        $this->rules = [
            'title' => 'required',
            'type'  =>'required',
        ];
        if ($this->type_content == 'video') {
            $this->rules['youtube_link'] = 'required';
        }
        $this->validate();
        ModuleContent::updateOrCreate([
            'id' => $this->id,
                 ], [
            'title'         => $this->title,
            'type'          => $this->type,
            'youtube_link'  => $this->youtube_link,
            'description'   => $this->description,
            'course_id'     => $this->course_id,
            'active'        => 1,
            'created_by'    => Auth::user()->name,
        ]);

        return redirect()->to('/cursos/modulo/' . $this->course_id)
            ->with('success', 'Modulo editado com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
