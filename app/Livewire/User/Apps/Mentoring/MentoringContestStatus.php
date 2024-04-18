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

class MentoringContestStatus extends Component
{
    public $matter;
    public $status;

    public function mount($matter)
    {
        $this->matter = ContestMatter::find($matter);

        if ($matter) {
            $mentoringContestUser = ContestUser::with('contest')->where('user_id', Auth::user()->id)->first();
            if ($mentoringContestUser->statusMatter($this->matter->id, $mentoringContestUser->id)) {
                $this->status = true;
            } else {
                $this->status = false;
            }
        }
    }
    public function render()
    {
        return view('livewire.user.apps.mentoring.mentoring-contest-status');
    }
    public function storeStatus()
    {
        ContestStatusMatter::create([
            'user_id'           => Auth::user()->id,
            'contest_matter_id' => $this->matter->id,
            'code'              => Str::uuid(),
            'contest_user_id'   => Auth::user()->contest->id,
            'created_by'        => Auth::user()->name,
        ]);
        $this->status = true;
    }
    public function deleteStatusMatter()
    {
        $data = ContestStatusMatter::find($this->matter->id);
        $data->delete();
        $this->status = false;
    }
}
