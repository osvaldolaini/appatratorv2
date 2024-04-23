<?php

namespace App\Livewire\User\Courses;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Http;

class AllCourses extends Component
{
    public $breadcrumb = 'Cursos';

    public $courses;
    public function mount()
    {
        $this->courses = Course::where('active',1)->get();
    }

    public function render()
    {
        return view('livewire.user.courses.all-courses');
    }
}
