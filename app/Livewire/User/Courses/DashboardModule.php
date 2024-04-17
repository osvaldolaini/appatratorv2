<?php

namespace App\Livewire\User\Courses;

use App\Models\Apps\Course\HistoryStudy;
use App\Models\Apps\Course\MyContent;
use App\Models\Apps\Course\MyModule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DashboardModule extends Component
{
    // Define o layout a ser usado
    protected $layout = 'courses';

    public $module;
    public $view = 'default';
    public $myContent;
    public $history;
    public function mount(MyModule $module)
    {
        $this->module = $module;
        $history = HistoryStudy::where('user_id',Auth::user()->id)
        ->where('module_id',$module->id)
        ->orderBy('created_at','desc')
        ->first();
        if ($history) {
            if($history->content_id){
                $myContent = MyContent::find($history->content_id);
                $this->view = $myContent->code;
                $this->myContent = $myContent;
            }
        }
    }
    public function render()
    {
        return view('livewire.user.courses.dashboard-module')
        ->layout('layouts.'.$this->layout);
    }
    public function changeContent($content_id)
    {
        $myContent = MyContent::find($content_id);
        $this->view = $myContent->code;
        $this->myContent = $myContent;
        $this->history = HistoryStudy::create([
            'course_id'     => $myContent->module->course_id,
            'module_id'     => $myContent->module_id,
            'content_id'    => $myContent->id,
            'user_id'       => Auth::user()->id,
        ]);
    }
    public function back()
    {
        redirect()->route('dashboard-course',[$this->module->course->code]);
    }
}
