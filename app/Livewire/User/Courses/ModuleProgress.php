<?php

namespace App\Livewire\User\Courses;

use App\Models\Apps\Course\MyModule;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ModuleProgress extends Component
{
    public $moduleProgress;

    public function mount(MyModule $module)
    {
        $this->moduleProgress = $module;
    }
    #[On('check')]
    public function render()
    {
        return view('livewire.user.courses.module-progress',[
            'module'=>$this->moduleProgress
        ]);
    }
}
