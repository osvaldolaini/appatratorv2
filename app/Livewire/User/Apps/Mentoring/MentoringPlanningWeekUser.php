<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestPlanningDailyUser;
use App\Models\User\Mentoring\ContestPlanningUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Component;

class MentoringPlanningWeekUser extends Component
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

    public $day;
    public $minutes;
    public $questions;

    public $planningUser;
    public $week;

    public $type = 'T';
    public $order;
    public $contest_discipline_id;
    public $contestPlanningUser;

    public $contestPlanningDailyUser;
    public $contestDiscipline;

    public $time_left;

    public function mount()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->planningUser = Auth::user()->planning;
        $this->week = Auth::user()->planning->pluck('day');
    }

    public function render()
    {
        return view('livewire.app.mentoring.mentoring-planning-week-user')
            ->layout('layouts.' . $this->layout);
    }
    //CREATE
    public function showModalCreate($planning_user_id,$time_left)
    {
        $this->contestPlanningUser = ContestPlanningUser::find($planning_user_id);
        $this->minutes = $this->contestPlanningUser->minutes;
        $this->contestDiscipline = $this->contestPlanningUser->contestUser->contest->discipline;
        $this->time_left = $time_left;
        $this->showModalCreate = true;
        // dd($this->time_left );
    }

    public function store()
    {
        $this->rules = [
            'order' => 'required',
            'minutes' => 'required',
            'type' => 'required',
            'contest_discipline_id' => 'required',
        ];
        $this->validate();

        ContestPlanningDailyUser::create([
            'order'                     => $this->order,
            'minutes'                   => $this->minutes,
            'type'                      => $this->type,
            'contest_discipline_id'     => $this->contest_discipline_id,
            'code'                      => Str::uuid(),
            'contest_planning_user_id'  => $this->contestPlanningUser->id,
            'user_id'                   => $this->user_id,
            'contest_user_id'           => Auth::user()->contest->id,
            'created_by'                => Auth::user()->name,
        ]);
        session()->flash('success', 'Planejamento criado com sucesso');

        $this->alertSession = true;
        $this->showModalCreate = false;
        $this->resetAll();
    }
    //UPDATE
    public function showModalEdit($id,$time_left)
    {
        $contestPlanningDailyUser = ContestPlanningDailyUser::find($id);
        $this->model_id      = $contestPlanningDailyUser->id;
        $this->order         = $contestPlanningDailyUser->order;
        $this->minutes       = $contestPlanningDailyUser->minutes;
        $this->type          = $contestPlanningDailyUser->type;
        $this->contest_discipline_id    = $contestPlanningDailyUser->contest_discipline_id;
        $this->showModalEdit = true;
        $this->time_left = $contestPlanningDailyUser->minutes + $time_left;

        $this->contestDiscipline = $contestPlanningDailyUser->planning->contestUser->contest->discipline;
    }
    public function update()
    {
        $this->rules = [
            'order' => 'required',
            'minutes' => 'required',
            'type' => 'required',
            'contest_discipline_id' => 'required',
        ];
        $this->validate();

        ContestPlanningDailyUser::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'order'                     => $this->order,
            'minutes'                   => $this->minutes,
            'type'                      => $this->type,
            'contest_discipline_id'     => $this->contest_discipline_id,
            'updated_by' => Auth::user()->name,
        ]);

        session()->flash('success', 'Planejamento atualizado com sucesso');

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
        $data = ContestPlanningDailyUser::find($id);
        $data->delete();

        session()->flash('success', 'Planejamento excluido com sucesso.');

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
        $this->mount($this->contestPlanningUser);
        $this->reset(
            'type',
            'minutes',
            'order',
            'contest_discipline_id'
        );
    }
}
