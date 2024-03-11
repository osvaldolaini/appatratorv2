<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Apps\Mentoring\ContestUser;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class MentoringKindStudyUser extends Component
{

    public $alertSession = false;

    public $kindOfStudy;
    public $contestUser;

    protected $listeners =
    [
        'openAlert'
    ];
    public function mount()
    {
        $this->contestUser = Auth::user()->contest;
        if (Auth::user()->contest) {
            $this->kindOfStudy = Auth::user()->contest->cycles;
        }

    }
    public function render()
    {
        return view('livewire.user.apps.mentoring.mentoring-kind-study-user');
    }

    public function weekStudy()
    {
        $this->contestUser = ContestUser::updateOrCreate([
            'id'         => Auth::user()->contest->id,
        ], [
            'cycles'     => 0,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success','Troca realizada com sucesso.');
    }
    public function cycleStudy()
    {
        $this->contestUser = ContestUser::updateOrCreate([
            'id'         => Auth::user()->contest->id,
        ], [
            'cycles'     => 1,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success','Troca realizada com sucesso.');
    }
    //OPEN MESSAGE
    public function openAlert($status, $msg)
    {
        session()->flash($status, $msg);
        $this->alertSession = true;
        return redirect()->route('apps.contest.user');
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}
