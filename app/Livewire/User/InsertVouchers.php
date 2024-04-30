<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InsertVouchers extends Component
{

    public function render()
    {
        return view('livewire.user.my-apps')
        ->layout('layouts.'.$this->layout);
    }
}
