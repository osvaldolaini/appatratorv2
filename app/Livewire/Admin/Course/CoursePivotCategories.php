<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\CategoryCourse;
use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\CoursePivotCategory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Str;

class CoursePivotCategories extends Component
{
    public $breadcrumb_title;
    //Dados principais
    public $categories;
    public $categoryCourse  = [];
    public $courses_id;
    public $exclude = [];
    public $category_id = '';
    public $course;


    public function mount(Course $course)
    {
        $this->breadcrumb_title     = $course->title;
        $this->courses_id = $course->id;
        $this->course = $course;
        $this->exclude = CoursePivotCategory::where('courses_id',$this->course->id)->pluck('category_courses_id')->toArray();
        $this->categoryCourse = CoursePivotCategory::where('courses_id',$this->course->id)->get();
        $this->categories = CategoryCourse::select('id', 'title')->where('active', 1)->get();
        // dd($this->exclude);
    }

    public function render()
    {
        $this->exclude = CoursePivotCategory::where('courses_id',$this->course->id)->pluck('category_courses_id')->toArray();
        $this->categoryCourse = CoursePivotCategory::where('courses_id',$this->course->id)->get();
        $this->categories = CategoryCourse::select('id', 'title')->where('active', 1)->get();
        return view('livewire.admin.courses.course-categories');
    }
    public function insert()
    {
        // dd($this->category_id);
        CoursePivotCategory::create([
            'courses_id' => $this->courses_id,
            'category_courses_id' => $this->category_id,
        ]);
    }

    public function delete($id)
    {
        CoursePivotCategory::where('id', $id)->delete();
        $this->openAlert('success', 'Registro excluido com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
