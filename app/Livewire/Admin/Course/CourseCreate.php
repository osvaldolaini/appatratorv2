<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\CategoryCourse;
use App\Models\Admin\Course\Filters\Institution;
use App\Models\Admin\Course\Filters\Modality;
use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Str;

class CourseCreate extends Component
{
    public $breadcrumb_title = 'NOVO CURSO';
    public $text;
    public $rules;

    //Dados principais
    public $title;
    public $active = 1;
    public $highlighted = 1;
    public $meta_description;
    public $large_description;
    public $meta_tags;
    public $link;
    public $youtube_link;
    public $price_id;

    public function render()
    {
        return view('livewire.admin.courses.course-form');
    }
    public function create()
    {
        $this->rules = [
            'title' => 'required|unique:courses',
        ];
        $this->validate();
        Course::create([
            'active'                    => 1,
            'title'                     => $this->title,
            'highlighted'               => $this->highlighted,
            'meta_description'          => $this->meta_description,
            'large_description'         => $this->large_description,
            'meta_tags'                 => $this->meta_tags,
            'link'                      => $this->link,
            'youtube_link'              => $this->youtube_link,
            'price_id'                  => $this->price_id,
            'code'                      => Str::uuid(),
            'created_by'                => Auth::user()->name,
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
