<?php

namespace App\Livewire\User\Courses;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Http;

class CoursePacks extends Component
{
    public $breadcrumb = 'Pacotes';
    // Define o layout a ser usado
    protected $layout = 'lobby';
    public $packs;
    public function mount(Course $course)
    {
        $this->packs = $course->packs;
    }

    public function render()
    {
        return view('livewire.user.course-packs')
            ->layout('layouts.' . $this->layout);
    }
}
