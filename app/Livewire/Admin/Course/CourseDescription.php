<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CourseDescription extends Component
{
    public $breadcrumb_title;
    //Dados principais
    public $id;
    public $large_description;
    public $course;


    public function mount(Course $course)
    {
        $this->breadcrumb_title     = $course->title;
        $this->id = $course->id;
        $this->large_description = $course->large_description;
        $this->course = $course;
    }

    public function render()
    {
        return view('livewire.admin.courses.course-description');
    }
    public function save()
    {
        course::updateOrCreate([
            'id'        => $this->id,
        ], [
            'large_description'         => $this->large_description,
            'updated_by'                => Auth::user()->name,
        ]);

        return redirect()->to('/cursos')
            ->with('success', 'Curso criado com sucesso.');
    }

    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
