<?php

namespace App\Livewire\User\Courses;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Http;

class ApiCourses extends Component
{
    public $breadcrumb = 'Cursos';

    public $data;
    public function mount()
    {
        $courses = Http::get('https://atratorconcursos.com.br/api/dados-cursos');
        $this->data = json_encode($courses->json()['data']);
    }

    public function render()
    {
        return view('livewire.user.courses.api-courses');
    }
}
