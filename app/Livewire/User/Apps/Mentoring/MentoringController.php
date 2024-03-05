<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestUser;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class MentoringController extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $name;
    public $tconcluded;
    public $counter;
    public $simulateds;
    public $essays;
    public $questions;
    public $contestUser;

    public function mount()
    {
         //Redireciona para a escolha do curso
         if (Gate::allows('contest-user')) {
            abort(403);
        }
    }
    public function render()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $valueAverageEssays = [];
            $valueAverageSimulated = [];
            $this->essays = 0;
            $this->simulateds = 0;
            $this->contestUser = Auth::user()->contest;

            foreach ($this->contestUser->essays->toArray() as $value) {
                if ($value['mark']) {
                    $valueAverageEssays[] = $value['mark'];
                }
            }

            foreach ($this->contestUser->simulated->toArray() as $value) {
                if ($value['grade']) {
                    $valueAverageSimulated[] = $value['grade'];
                }
            }

            $mentoringContestUser = ContestUser::with('contest')->where('user_id',Auth::user()->id)->first();

            $this->name = Auth::user()->name;
            if($this->contestUser->progress()['value'] > 0)
            {
                $this->tconcluded = number_format($this->contestUser->progress()['value'] * 100 / $this->contestUser->progress()['max'], 0, ',', '');
            }else{
                $this->tconcluded = 0;
            }

            $this->counter = (new DateTime())->diff(new DateTime($mentoringContestUser->contest->day))->days;
            if (count(array_slice($valueAverageSimulated, -3))) {
                $this->simulateds = number_format(array_sum(array_slice($valueAverageSimulated, -3)) / count(array_slice($valueAverageSimulated, -3)), 0, ',', '');
            }
            if (count(array_slice($valueAverageEssays, -3))) {
                $this->essays = number_format(array_sum(array_slice($valueAverageEssays, -3)) / count(array_slice($valueAverageEssays, -3)), 0, ',', '');
            }
            $this->questions = $this->contestUser->questions();
        return view('livewire.app.mentoring.mentoring-controller')
            ->layout('layouts.' . $this->layout);
    }
}
