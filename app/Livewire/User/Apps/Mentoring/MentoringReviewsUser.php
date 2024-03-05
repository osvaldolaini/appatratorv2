<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\Admin\Mentoring\Contest;
use App\Models\User\Mentoring\ContestReviews;
use App\Models\User\Mentoring\ContestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class MentoringReviewsUser extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $allContests;
    public $contest_id;
    public $rules;
    public $alertSession = false;
    public $showJetModal = false;
    public $mentoringContestUser;
    public $user_id;
    public $contentMatter;
    public $model_id;

    public function mount()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->mentoringContestUser = ContestUser::with('contest')->where('user_id',Auth::user()->id)->first();
        if (!isset($this->mentoringContestUser)) {
            $this->allContests = Contest::all();
        }else{
            $this->allContests = '';
        }
        $this->user_id = Auth::user()->id;
        // dd($this->allContests);
    }
    public function render()
    {
        return view('livewire.app.mentoring.mentoring-reviews-user')
        ->layout('layouts.' . $this->layout);
    }
    public function showModal($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->model_id = $id;
        } else {
            $this->model_id = '';
        }
    }
    public function delete($id)
    {
        $data = ContestReviews::find($id);
        $data->delete();

        session()->flash('success', 'Revisão excluida com sucesso.');

        $this->alertSession = true;
        $this->showJetModal = false;
    }

    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}
