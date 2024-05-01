<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Shopping extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';
    public function render()
    {
        return view('livewire.user.shopping')
        ->layout('layouts.'.$this->layout);
    }
}
