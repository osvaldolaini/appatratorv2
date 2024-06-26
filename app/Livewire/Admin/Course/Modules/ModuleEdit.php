<?php

namespace App\Livewire\Admin\Course\Modules;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\Module;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class ModuleEdit extends Component
{
    public $breadcrumb = 'Módulos de: ';
    public $rules;

    public $title;
    public $description;
    public $type = 1;
    public $course_id;
    public $id;

    public function mount(Module $module)
    {
        $this->course_id = $module->course_id;
        $this->id = $module->id;
        $this->title = $module->title;
        $this->description = $module->description;
        $this->type = $module->type;
        $this->breadcrumb.= $module->title;
    }
    public function back()
    {
        redirect()->route('module',$this->course_id);
    }
    public function render()
    {
        return view('livewire.admin.courses.modules.edit');
    }
    public function create()
    {
        $this->rules = [
            'title' => 'required',
            'type'  =>'required',
        ];
        $this->validate();
        Module::updateOrCreate([
            'id' => $this->id,
                 ], [
            'title'         => $this->title,
            'type'          => $this->type,
            'description'   => $this->description,
            'course_id'     => $this->course_id,
            'active'        => 1,
            'created_by'    => Auth::user()->name,
        ]);

        return redirect()->to('/cursos/modulo/' . $this->course_id)
            ->with('success', 'Modulo criada com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
