<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Apps\Mentoring\ContestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class MentoringContestUserBar extends Component
{
    public $title;
    public $subTitle = '';
    public $mentoringContestUser;

    protected $listeners =
    [
        'setContestUser',
    ];

    public function mount($title,$subTitle = null)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->mentoringContestUser = ContestUser::with('contest')->where('user_id',Auth::user()->id)->first();
    }
    public function render()
    {
        return view('livewire.user.apps.mentoring.mentoring-contest-user-bar');
    }
}
