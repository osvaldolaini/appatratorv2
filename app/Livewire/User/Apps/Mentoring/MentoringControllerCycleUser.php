<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Apps\Mentoring\ContestControllerCycleUser;
use App\Models\Apps\Mentoring\ContestPlanningCyclesUser;
use App\Models\Apps\Mentoring\ContestUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Livewire\Component;

class MentoringControllerCycleUser extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $showJetModal = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;

    public $planningCycleUser;
    public $model_id;

    protected $listeners =
    [
        'setContestUser'
    ];

    public function mount()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->planningCycleUser = Auth::user()->cycle;
    }

    public function render()
    {
        $this->planningCycleUser = Auth::user()->cycle;
        return view('livewire.user.apps.mentoring.mentoring-controller-cycle-user')
            ->layout('layouts.' . $this->layout);
    }
    public function createCycle($id)
    {
        $contestPlanningCyclesUser = ContestPlanningCyclesUser::find($id);
        $new_minutes = $contestPlanningCyclesUser->minutes + 30;
        ContestPlanningCyclesUser::updateOrCreate([
            'id' => $contestPlanningCyclesUser->id,
        ], [
            'minutes'               => $new_minutes
        ]);

        ContestControllerCycleUser::create([
            'user_id'               => Auth::user()->id,
            'planning_cycle_id'     => $contestPlanningCyclesUser->id,
            'created_by'            => Auth::user()->name,
        ]);

        session()->flash('success', 'Ciclo atualizado com sucesso');

        $this->alertSession = true;
        $this->showModalEdit = false;
    }
    //DELETE
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
        $pla = ContestControllerCycleUser::find($id);
        $contestPlanningCyclesUser = ContestPlanningCyclesUser::find($pla->planning_cycle_id);
        $new_minutes = $contestPlanningCyclesUser->minutes - 30;

        ContestPlanningCyclesUser::updateOrCreate([
            'id' => $contestPlanningCyclesUser->id,
        ], [
            'minutes'  => $new_minutes
        ]);
        $pla->delete();

        session()->flash('success', 'Item excluido com sucesso.');

        $this->alertSession = true;
        $this->showJetModal = false;
    }
    public function statusModel($id,$status)
    {
        $data = ContestControllerCycleUser::updateOrCreate([
            'id' => $id,
        ], [
            'status'  => $status
        ]);

        $cycles = $data->cycle->contestUser->myCycle;

        $isInactive = 0;
        foreach ($cycles as $item) {
            foreach ($item->itemCycle as $key) {
                if ($key->status == 0) {
                    $isInactive += 1;
                    session()->flash('success', 'Item concluído com sucesso.');
                    $this->alertSession = true;
                    break;

                }
            }
        }
        if($isInactive == 0){
            // dd($data->cycle->contestUser->id);
            $contestUser = ContestUser::updateOrCreate([
                'id' => $data->cycle->contestUser->id,
            ], [
                'qtd_cycles'  => $data->cycle->contestUser->qtd_cycles + 1,
            ]);

            foreach ($cycles as $item) {
                foreach ($item->itemCycle as $key) {
                    ContestControllerCycleUser::updateOrCreate([
                        'id' => $key->id,
                    ], [
                        'status'  => 0,
                    ]);
                }
            }
            session()->flash('success', 'Ciclo concluído com sucesso.');
            $this->alertSession = true;

            return redirect()->route('apps.contestControllerCycleUser.user');
        }

    }
}
