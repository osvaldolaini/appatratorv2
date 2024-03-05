<?php

namespace App\Http\Livewire\App\Mentoring\Charts\Controller;

use App\Models\Admin\Mentoring\ContestDiscipline;
use App\Models\User\Mentoring\ContestUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ControllerScore extends Component
{
    public $mentoringContestUser;
    public $dicipProgress;
    public $labels;
    public $dconcluded;
    public $perform;

    public function mount()
    {
        $this->mentoringContestUser = ContestUser::with('contest')->where('user_id', Auth::user()->id)->first();
        $diciplines = ContestDiscipline::where('contest_id', Auth::user()
            ->contest
            ->contest_id)
            ->orderBy('order')
            ->get();

        foreach ($diciplines as $discipline) {
            if ($this->mentoringContestUser->progress($discipline)['max']) {
            $this->dconcluded[] = number_format($this->mentoringContestUser->progress($discipline)['value'] * 100 / $this->mentoringContestUser->progress($discipline)['max'], 0, '.', ' ');
            }
            else {
                $this->dconcluded[] = 0;
            }
            if ($discipline->perform) {
            $this->perform[] = number_format($discipline->perform, 0, '.', ' ');
            }
            else{
            $this->perform[] = 0;
            }
        }

        $this->labels = $diciplines->pluck('nick')->toArray();

        array_multisort($this->perform, SORT_DESC, $this->dconcluded, $this->labels);

    }
    public function render()
    {
        return view('livewire.app.mentoring.charts.controller.controller-score');
    }
}
