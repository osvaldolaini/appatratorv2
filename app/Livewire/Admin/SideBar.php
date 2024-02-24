<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SideBar extends Component
{
    public function render()
    {
        return view('livewire.admin.side-bar');
    }
}
