<?php

namespace App\Livewire\User\Apps\Mentoring\Charts\Simulated;


use App\Models\Apps\Mentoring\ContestSimulated;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SimulatedScore extends Component
{
    public $hitss;
    public $missess;
    public $guessess;
    public $blankss;
    public $labels;

    public function mount()
    {
        $this->hitss    = [];
        $this->missess  = [];
        $this->guessess = [];
        $this->blankss  = [];
        $this->labels   = [];

        $myContestSimulated = ContestSimulated::where('user_id', Auth::user()->id)
            ->orderBy('day', 'desc')->get();
        $this->labels = $myContestSimulated->map(
            fn ($rtn) => [
                'day' => $rtn->day,
            ]
        )->pluck('day')->toArray();
        $this->hitss = $myContestSimulated->pluck('hits')->toArray();
        $this->missess  = $myContestSimulated->pluck('misses')->toArray();
        $this->guessess = $myContestSimulated->pluck('guesses')->toArray();
        $this->blankss  = $myContestSimulated->pluck('blanks')->toArray();
    }

    public function render()
    {
        return view('livewire.user.apps.mentoring.charts.simulated.simulated-score');
    }
}
