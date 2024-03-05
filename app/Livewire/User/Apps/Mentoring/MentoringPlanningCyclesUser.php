<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestControllerCycleUser;
use App\Models\User\Mentoring\ContestPlanningCyclesUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

use Livewire\Component;
use Illuminate\Support\Str;

class MentoringPlanningCyclesUser extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $showJetModal = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;

    public $rules;
    public $model_id;
    public $user_id;
    public $contest_user_id;

    public $contest_discipline_id;
    public $minutes;
    public $order;

    public $planningCycleUser;
    public $cycle;

    public $disciplines;

    public function mount()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->planningCycleUser = Auth::user()->cycle;
        $this->cycle = Auth::user()->cycle->pluck('contest_discipline_id');
        $this->disciplines = Auth::user()->contest->contest->discipline->where('status',1);
    }
    public function render()
    {
        $this->planningCycleUser = Auth::user()->cycle;
        $this->cycle = Auth::user()->cycle->pluck('contest_discipline_id');
        return view('livewire.app.mentoring.mentoring-planning-cycles-user')
            ->layout('layouts.' . $this->layout);
    }
    //CREATE
    public function showModalCreate()
    {
        $this->showModalCreate = true;
        $this->resetAll();
    }
    public function store()
    {
        $this->rules = [
            'order' => 'required',
            'minutes' => 'required',
        ];
        $this->validate();

        // dd(Auth::user()->contest->contest_id);
        $data = ContestPlanningCyclesUser::create([
            'user_id'               => $this->user_id,
            'order'                 => $this->order,
            'minutes'               => $this->minutes,
            'contest_discipline_id' => $this->contest_discipline_id,
            'code'                  => Str::uuid(),
            'contest_user_id'       => Auth::user()->contest->id,
            'created_by'            => Auth::user()->name,
        ]);

        if ($data) {
            $c = $data->minutes/30;
            for ($i=0; $i < $c; $i++) {
                ContestControllerCycleUser::create([
                    'user_id'               => $data->user_id,
                    'planning_cycle_id'     => $data->id,
                    'created_by'            => Auth::user()->name,
                ]);
            }
        }
        session()->flash('success', 'Ciclo criado com sucesso');

        $this->alertSession = true;
        $this->showModalCreate = false;
        $this->resetAll();
    }

    //UPDATE
    public function showModalEdit(ContestPlanningCyclesUser $contestPlanningCyclesUser)
    {
        $this->model_id     = $contestPlanningCyclesUser->id;
        $this->minutes      = $contestPlanningCyclesUser->minutes;
        $this->order        = $contestPlanningCyclesUser->order;
        $this->contest_discipline_id        = $contestPlanningCyclesUser->contest_discipline_id;
        $this->showModalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'order' => 'required',
            'minutes' => 'required',
        ];
        $this->validate();
        $old_minutes = $data = ContestPlanningCyclesUser::find($this->model_id)->minutes;
        $data = ContestPlanningCyclesUser::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'order'                 => $this->order,
            'minutes'               => $this->minutes,
            'contest_discipline_id' => $this->contest_discipline_id,
            'updated_by'            => Auth::user()->name,
        ]);

        if ($data) {
            if ($this->minutes > $old_minutes) {
                $dif = $this->minutes - $old_minutes;
                $c = $dif/30;
                for ($i=0; $i < $c; $i++) {
                    ContestControllerCycleUser::create([
                        'user_id'               => Auth::user()->id,
                        'planning_cycle_id'     => $this->model_id,
                        'created_by'            => Auth::user()->name,
                    ]);
                }
            }elseif($this->minutes < $old_minutes){
                $dif = $old_minutes - $this->minutes;
                $c = $dif/30;
                $del = ContestControllerCycleUser::where('planning_cycle_id',$this->model_id)
                ->orderBy('id','desc')->limit($c)->get();
                foreach ($del as $key ) {
                    $dataK = ContestControllerCycleUser::find($key->id);
                    $dataK->delete();
                }

            }
        }

        session()->flash('success', 'Ciclo atualizado com sucesso');

        $this->alertSession = true;
        $this->showModalEdit = false;
        $this->resetAll();
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
        $data = ContestPlanningCyclesUser::find($id);
        $data->delete();

        session()->flash('success', 'Ciclo excluido com sucesso.');

        $this->alertSession = true;
        $this->showJetModal = false;
        $this->resetAll();
    }

    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
    //Ressetar as inputs
    public function resetAll()
    {
        $this->reset(
            'order',
            'minutes',
            'contest_discipline_id'
        );
    }
}
