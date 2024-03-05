<?php

namespace App\Livewire\User;

use Livewire\Component;

class NavBar extends Component
{
    public function render()
    {
        return view('livewire.user.nav-bar');
    }
    public function openModalSearch()
    {
        $this->emit('openModalSearch');
    }
}
