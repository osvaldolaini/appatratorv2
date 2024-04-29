<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\PackPivotCourse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class CoursePackDescription extends Component
{
    public $breadcrumb_title;
    //Dados principais
    public $id;
    public $description;
    public $course;
    public $course_id;

    public function mount(PackPivotCourse $packPivotCourse)
    {
        $this->breadcrumb_title = $packPivotCourse->title;
        $this->id = $packPivotCourse->id;
        $this->description = $packPivotCourse->description;
        $this->course_id = $packPivotCourse->course->id;
    }

    public function render()
    {
        return view('livewire.admin.courses.course-pack-description');
    }
    public function save()
    {
        PackPivotCourse::updateOrCreate([
            'id'        => $this->id,
        ], [
            'description'         => $this->description,
            'updated_by'          => Auth::user()->name,
        ]);

        return redirect()->to('/cursos/valores/'.$this->course_id)
            ->with('success', 'Curso criado com sucesso.');
    }
    public function back()
    {
        return redirect()->to('/cursos/valores/'.$this->course_id);
    }

    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
