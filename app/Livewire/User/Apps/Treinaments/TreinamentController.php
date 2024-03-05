<?php

namespace App\Http\Livewire\App\Treinaments;

use Livewire\Component;

class TreinamentController extends Component
{
    // Define o layout a ser usado
    protected $layout = 'treinaments';
    public function render()
    {
        return view('livewire.app.treinaments.home-treinaments')
        ->layout('layouts.' . $this->layout);
    }
}
