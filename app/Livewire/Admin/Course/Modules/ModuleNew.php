<?php

namespace App\Livewire\Admin\Course\Modules;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\Module;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class ModuleNew extends Component
{
    public $breadcrumb = 'Módulos de: ';
    public $text;
    public $rules;

    public $title;
    public $description;
    public $type = 1;
    public $course_id;
    public function mount(Course $course)
    {
        $this->course_id = $course->id;
    }
    public function back()
    {
        redirect()->route('module',$this->course_id);
    }

    public function render()
    {
        return view('livewire.admin.courses.modules.new');
    }
    public function create()
    {
        $this->rules = [
            'title' => 'required',
            'type'  =>'required',
        ];
        $this->validate();

        Module::create([
            'title'         => $this->title,
            'type'          => $this->type,
            'description'   => $this->description,
            'course_id'     => $this->course_id,
            'active'        => 1,
            'code'          => Str::uuid(),
            'created_by'    => Auth::user()->name,
        ]);

        return redirect()->to('/cursos/modulo/' . $this->course_id)
            ->with('success', 'Módulo criada com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
