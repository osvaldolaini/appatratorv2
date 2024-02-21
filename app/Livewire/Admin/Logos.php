<?php

namespace App\Livewire\Admin;

use App\Models\Admin\Configs;
use Livewire\Component;

class Logos extends Component
{
    public function render()
    {
        return view('livewire.admin.logos',[
            'config'=>Configs::find(1),
        ]);
    }
}
