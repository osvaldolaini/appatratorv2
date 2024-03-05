<?php

namespace App\Http\Livewire\App\Mentoring\Charts\Essay;

use App\Models\User\Mentoring\ContestEssays;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EssayScore extends Component
{
    public $marks;
    public $full_marks;
    public $labels;

    public function mount()
    {
        $this->marks = [];
        $this->full_marks = [];
        $this->labels = [];

        $myContestEssays = ContestEssays::where('user_id', Auth::user()->id)
            ->orderBy('day', 'desc')->orderBy('id', 'desc')->get();

        $this->labels = $myContestEssays->map(
            fn($rtn) => [
                'day' => $rtn->dayMonth(),
            ]
        )->pluck('day')->toArray();

        $this->marks = $myContestEssays->pluck('mark')->toArray();
        $this->full_marks = $myContestEssays->pluck('full_mark')->toArray();
    }

    public function render()
    {
        return view('livewire.app.mentoring.charts.essay.essay-score');

    }
}
