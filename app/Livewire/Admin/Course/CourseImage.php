<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseImage extends Component
{
    public $breadcrumb_title;
    public $id;

    public function mount(Course $course)
    {
        $this->id                   = $course->id;
        $this->breadcrumb_title     = $course->title;
    }
    public function render()
    {
        return view('livewire.admin.courses.course-image');
    }

    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
