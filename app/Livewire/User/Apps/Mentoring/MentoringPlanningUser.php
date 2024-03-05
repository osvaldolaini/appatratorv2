<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestPlanningUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Illuminate\Support\Str;

class MentoringPlanningUser extends Component
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

    public function mount()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->planningUser = Auth::user()->planning;
        $this->week = Auth::user()->planning->pluck('day');
        // dd($this->contestUser);
    }
    public function render()
    {
        $this->planningUser = Auth::user()->planning;
        $this->week = Auth::user()->planning->pluck('day');
        return view('livewire.app.mentoring.mentoring-planning-user')
        ->layout('layouts.' . $this->layout);
    }
        //CREATE
        public function showModalCreate()
        {
            $this->showModalCreate = true;
        }
        public function store()
        {
            $this->rules = [
                'day' => 'required',
                'minutes' => 'required',
            ];
            $this->validate();

            // dd(Auth::user()->contest->contest_id);
            ContestPlanningUser::create([
                'user_id'           => $this->user_id,
                'day'               => $this->day,
                'minutes'           => $this->minutes,
                'questions'         => $this->questions,
                'code'              => Str::uuid(),
                'contest_user_id'   => Auth::user()->contest->id,
                'created_by'        => Auth::user()->name,
            ]);
            session()->flash('success', 'Planejamento criado com sucesso');

            $this->alertSession = true;
            $this->showModalCreate = false;
            $this->resetAll();
        }

        //UPDATE
        public function showModalEdit($id)
        {
            $contestPlanningUser = ContestPlanningUser::find($id);
            $this->model_id     = $contestPlanningUser->id;
            $this->questions    = $contestPlanningUser->questions;
            $this->minutes      = $contestPlanningUser->minutes;
            $this->day          = $contestPlanningUser->day;
            $this->showModalEdit = true;
        }
        public function update()
        {
            $this->rules = [
                'day' => 'required',
                'minutes' => 'required',
            ];
            $this->validate();

            ContestPlanningUser::updateOrCreate([
                'id' => $this->model_id,
            ], [
                'day'               => $this->day,
                'minutes'           => $this->minutes,
                'questions'         => $this->questions,
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
            $data = ContestPlanningUser::find($id);
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
            $this->reset('day',
            'minutes',
             'questions');
        }
}
