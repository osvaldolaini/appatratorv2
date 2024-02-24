<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Panel extends Component
{
    public function mount()
    {
        if (Auth::user()->group == 'admin') {
            return redirect()->route('master-panel');
        }
    }
    public function render()
    {
        return view('livewire.admin.panel');
    }
}
