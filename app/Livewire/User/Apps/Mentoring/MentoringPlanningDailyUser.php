<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestPlanningDailyUser;
use App\Models\User\Mentoring\ContestPlanningUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

use Livewire\Component;

class MentoringPlanningDailyUser extends Component
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

    public $type = 'T';
    public $order;
    public $minutes;
    public $contest_discipline_id;

    public $contestPlanningDailyUser;
    public $contestPlanningUser;
    public $contestDiscipline;

    public $time_left;

    public function mount(ContestPlanningUser $contestPlanningUser)
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->contestPlanningUser = $contestPlanningUser;
        $this->contestPlanningDailyUser = ContestPlanningDailyUser::where('contest_planning_user_id',$contestPlanningUser->id)->get();
        $this->contestDiscipline = $contestPlanningUser->contestUser->contest->discipline;

        $this->time_left($this->contestPlanningDailyUser->pluck('minutes'));
    }
    public function render()
    {
        return view('livewire.app.mentoring.mentoring-planning-daily-user')
            ->layout('layouts.' . $this->layout);
    }
    public function time_left($times)
    {
        $time_used=0;
        if ($times) {
            foreach ($times as $key => $value) {
                $time_used += $value;
            }
        }

        $this->time_left = $this->contestPlanningUser->minutes - $time_used;
    }
    //CREATE
    public function showModalCreate()
    {
        $this->showModalCreate = true;
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

        // dd(Auth::user()->contest->contest_id);
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
    public function showModalEdit($id)
    {
        $contestPlanningDailyUser = ContestPlanningDailyUser::find($id);
        $this->model_id      = $contestPlanningDailyUser->id;
        $this->order         = $contestPlanningDailyUser->order;
        $this->minutes       = $contestPlanningDailyUser->minutes;
        $this->type          = $contestPlanningDailyUser->type;
        $this->contest_discipline_id    = $contestPlanningDailyUser->contest_discipline_id;
        $this->showModalEdit = true;
        $this->time_left += $contestPlanningDailyUser->minutes;
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
