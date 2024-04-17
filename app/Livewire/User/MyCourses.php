<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyCourses extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';

    public $vouchers;
    public function mount()
    {
        $this->vouchers = Auth::user()->vouchers
                        ->where('active',1)
                        ->where('application','courses')
                        ->where('limit_access','>=', date('Y-m-d h:i:s'))
                        ->unique('course_id');
    }
    public function render()
    {
        return view('livewire.user.my-courses')
        ->layout('layouts.'.$this->layout);
    }
    public function goCourse($code)
    {
        return redirect()->to('/curso/'.$code);
    }
}
