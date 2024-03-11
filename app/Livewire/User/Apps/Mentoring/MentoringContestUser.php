<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Admin\Mentoring\Contest;
use App\Models\Admin\Mentoring\ContestMatter;
use App\Models\Apps\Mentoring\ContestReviews;
use App\Models\Apps\Mentoring\ContestStatusMatter;
use App\Models\Apps\Mentoring\ContestUser;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Livewire\Component;

class MentoringContestUser extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $allContests;
    public $contest_id;
    public $rules;
    public $alertSession = false;
    public $showQuestionsModal = false;
    public $showReviewsModal = false;
    public $mentoringContestUser;
    public $user_id;
    public $contentMatter;
    public $day;
    public $matter_id;

    public function mount()
    {
        $this->mentoringContestUser = ContestUser::with('contest')->where('user_id', Auth::user()->id)->first();
        if (!isset($this->mentoringContestUser)) {
            $this->allContests = Contest::where('active',1)->get();
        } else {
            $this->allContests = '';
        }

        $this->user_id = Auth::user()->id;
    }
    public function render()
    {
        return view('livewire.user.apps.mentoring.mentoring-contest-user')
            ->layout('layouts.' . $this->layout);
    }
    public function store()
    {
        $this->rules = [
            'contest_id' => 'required',
        ];

        $this->validate();
        ContestUser::create([
            'contest_id' => $this->contest_id,
            'user_id'   => $this->user_id,
            'code'      => Str::uuid(),
            'created_by' => Auth::user()->name,
        ]);
        session()->flash('success', 'Registro criado com sucesso');

        $this->alertSession = true;
        $this->reset('contest_id');
        return redirect()->to('/meu-concurso');
    }
    //Questions
    public function showQuestions($id)
    {
        $this->showQuestionsModal = true;
        if (isset($id)) {
            $this->contentMatter = ContestMatter::find($id);
        }
    }

    //CREATE
    public function showReviews($matter)
    {
        $this->matter_id = $matter;
        $this->showReviewsModal = true;
    }
    public function storeReview()
    {
        $this->rules = [
            'day' => 'required',
        ];
        $this->validate();
        ContestReviews::create([
            'user_id'           => $this->user_id,
            'contest_matter_id' => $this->matter_id,
            'day'               => $this->day,
            'code'              => Str::uuid(),
            'contest_user_id'   => Auth::user()->contest->id,
            'created_by'        => Auth::user()->name,
        ]);
        session()->flash('success', 'Endereço criado com sucesso');

        $this->alertSession = true;
        $this->showReviewsModal = false;
        $this->reset('day');
    }

    public function storeStatus($matter)
    {
        ContestStatusMatter::create([
            'user_id'           => $this->user_id,
            'contest_matter_id' => $matter,
            'code'              => Str::uuid(),
            'contest_user_id'   => Auth::user()->contest->id,
            'created_by'        => Auth::user()->name,
        ]);
    }
    public function deleteStatusMatter($status_id)
    {
        $data = ContestStatusMatter::find($status_id);
        $data->delete();
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->emit('openAlert', $status, $msg);
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}
