<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Apps\Treinament\Season;
use App\Models\Apps\Treinament\SeasonTreinament;
use App\Models\Apps\Treinament\Training;
use App\Models\Admin\Treinament\Exercise;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeTreinament extends Component
{
    public $seasons;

    // Define o layout a ser usado
    protected $layout = 'treinaments';

    public function mount()
    {
        $this->seasons = Auth::user()->seasons;
        // dd($this->seasons);
    }
    public function render()
    {
        return view('livewire.user.apps.treinaments.home-treinament')
        ->layout('layouts.' . $this->layout);
    }
}
