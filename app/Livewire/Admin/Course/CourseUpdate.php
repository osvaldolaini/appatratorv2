<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CourseUpdate extends Component
{
    public $breadcrumb_title;

    //Dados principais
    public $id;
    public $title;
    public $highlighted;
    public $meta_description;
    public $large_description;
    public $meta_tags;
    public $link;
    public $youtube_link;
    public $price_id;
    public $rules;
    public $slug;

    public function mount(Course $course)
    {
        $this->id                   = $course->id;
        $this->title                = $course->title;
        $this->highlighted          = $course->highlighted;
        $this->meta_description     = $course->meta_description;
        $this->large_description    = $course->large_description;
        $this->meta_tags            = $course->meta_tags;
        $this->link                 = $course->link;
        $this->youtube_link         = $course->youtube_link;
        $this->price_id             = $course->price_id;
        $this->breadcrumb_title     = $course->title;
        $this->slug                 = $course->slug;
    }
    public function render()
    {
        return view('livewire.admin.courses.course-form');
    }
    public function update()
    {
        $this->rules = [
            'title' => 'required',
        ];
        $this->validate();
        course::updateOrCreate([
            'id'        => $this->id,
        ], [
            'title'                     => $this->title,
            'highlighted'               => $this->highlighted,
            'meta_description'          => $this->meta_description,
            'large_description'         => $this->large_description,
            'meta_tags'                 => $this->meta_tags,
            'link'                      => $this->link,
            'youtube_link'              => $this->youtube_link,
            'price_id'                  => $this->price_id,
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
