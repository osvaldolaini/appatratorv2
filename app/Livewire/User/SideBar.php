<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
        return view('livewire.user.side-bar');
    }
}
