<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestDiscipline;
use App\Models\Apps\Mentoring\ContestQuestions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class MentoringQuestionsChart extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $qtds;
    public $hits;
    // public $misses;
    public $qts;

    public $labels;

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


        $this->hits     = [];
        // $this->misses   = [];
        $this->qtds     = [];
        $this->labels   = [];

        $myContents = ContestDiscipline::where('contest_id', Auth::user()->contest->contest_id)->orderBy('order')
        ->get();
        foreach ($myContents as $myContent) {
            $this->labels[] = $myContent->title;
            $q=0;
            $h=0;
            foreach ($myContent->contestMatter as $matter) {
                $questions = ContestQuestions::where('user_id',Auth::user()->id)
                ->where('contest_matter_id',$matter->id)
                ->get();
                foreach ($questions as $value) {
                    $q +=$value->qtd;
                    $h +=$value->hits;
                }
            }
            $this->hits[] = $h;
            $this->qtds[] = $q;
        }
        return view('livewire.user.apps.mentoring.mentoring-questions-chart')
        ->layout('layouts.' . $this->layout);
    }
}
