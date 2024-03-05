<?php

namespace App\Livewire\User;

use Livewire\Component;

class UserProfile extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';
    public function render()
    {
        return view('livewire.user.user-profile')
        ->layout('layouts.' . $this->layout);
    }
}
