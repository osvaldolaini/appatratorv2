<?php

namespace App\Livewire\User\Courses;

use App\Models\Apps\Course\MyModule;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ContentSideBar extends Component
{
    public $module;
    public function mount(MyModule $module)
    {
        $this->module = $module;
    }
    public function render()
    {
        return view('livewire.user.courses.content-side-bar');
    }
}
