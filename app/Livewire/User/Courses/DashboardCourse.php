<?php

namespace App\Livewire\User\Courses;

use App\Models\Apps\Course\MyCourse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardCourse extends Component
{
    // Define o layout a ser usado
    protected $layout = 'courses';

    public $course;
    public function mount(MyCourse $course)
    {
        $this->course = $course;
    }
    public function render()
    {
        return view('livewire.user.courses.dashboard')
        ->layout('layouts.'.$this->layout);
    }
    public function back()
    {
        redirect()->route('lobby');
    }
}
