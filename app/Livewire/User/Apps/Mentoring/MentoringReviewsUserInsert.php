<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestMatter;
use App\Models\Apps\Mentoring\ContestReviews;
use App\Models\Apps\Mentoring\ContestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Support\Str;

class MentoringReviewsUserInsert extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $mentoringContestUser;
    public $rules;
    public $alertSession = false;
    public $showReviewsModal = false;
    public $user_id;
    public $day;
    public $matter;
    public $reviews;

    public function mount($matter)
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->matter = ContestMatter::find($matter);
        $this->mentoringContestUser = Auth::user()->contest;
        $this->reviews = $this->mentoringContestUser->reviews($this->matter->id)->count();
        $this->user_id = Auth::user()->id;
        $this->day = date("d/m/Y");

    }

    public function render()
    {
        $this->reviews = $this->mentoringContestUser->reviews($this->matter->id)->count();
        return view('livewire.user.apps.mentoring.mentoring-reviews-user-insert');
    }

    public function showReviews()
    {
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
            'contest_matter_id' => $this->matter->id,
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

}
