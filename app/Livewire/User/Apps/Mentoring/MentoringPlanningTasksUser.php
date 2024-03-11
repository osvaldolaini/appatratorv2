<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestMatter;
use App\Models\Apps\Mentoring\ContestPlanningTasksUser;
use App\Models\Apps\Mentoring\ContestUser;
use App\Models\Apps\Mentoring\ContestReviews;
use App\Models\Apps\Mentoring\ContestStatusMatter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Component;

class MentoringPlanningTasksUser extends Component
{
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $showJetModal = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;
    public $showQuestionsModal = false;
    public $showReviewsModal = false;
    public $contentMatter;

    public $rules;
    public $model_id;
    public $user_id;
    public $contest_matter_id;
    public $matter_id;
    public $contest_planning_daily_id;
    public $contestPlanningUser;

    public $week;
    public $planningUser;
    public $mentoringContestUser;
    public $matters = array();

    public $day;
    public $title;

    public function mount($contestPlanningUser = null)
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->contestPlanningUser = $contestPlanningUser;
        $this->mentoringContestUser = ContestUser::with('contest')->where('user_id', Auth::user()->id)->first();
        $this->user_id = Auth::user()->id;
        if (isset($this->contestPlanningUser)) {
            $this->planningUser = Auth::user()->planning->where("code", $this->contestPlanningUser);
            $this->day = Auth::user()->planning->where("code", $this->contestPlanningUser)->first()->dayWeek();
            $this->title = 'Tarefas do dia';
        } else {
            $this->title = 'Tarefas diárias';
            $this->planningUser = Auth::user()->planning;
        }
        $this->week = $this->planningUser->pluck('day');
    }

    public function render()
    {
        if (isset($this->contestPlanningUser)) {
            return view('livewire.user.apps.mentoring.mentoring-planning-task-user')
            ->layout('layouts.' . $this->layout);
        }else{
            return view('livewire.user.apps.mentoring.mentoring-planning-tasks-user')
            ->layout('layouts.' . $this->layout);
        }

    }
    //CREATE
    public function showModalCreate($discipline, $daily_id)
    {
        $this->showModalCreate = true;
        $this->matters = ContestMatter::where('contest_discipline_id', $discipline)
            ->orderBy('order', 'asc')->get();
        $this->contest_planning_daily_id = $daily_id;
    }
    public function store()
    {
        $this->rules = [
            'contest_matter_id' => 'required',
        ];
        $this->validate();

        // dd(Auth::user()->contest->contest_id);
        ContestPlanningTasksUser::create([
            'contest_matter_id'         => $this->contest_matter_id,
            'code'                      => Str::uuid(),
            'contest_planning_daily_id' => $this->contest_planning_daily_id,
            'user_id'                   => $this->user_id,
            'created_by'                => Auth::user()->name,
        ]);
        session()->flash('success', 'Planejamento criado com sucesso');

        $this->alertSession = true;
        $this->showModalCreate = false;
        $this->resetAll();
    }

    //UPDATE
    public function showModalEdit(ContestPlanningTasksUser $contestPlanningTasksUser)
    {
        $this->matters = ContestMatter::where('contest_discipline_id', $contestPlanningTasksUser->matter->contest_discipline_id)
            ->orderBy('order', 'asc')->get();
        $this->model_id      = $contestPlanningTasksUser->id;
        $this->contest_matter_id    = $contestPlanningTasksUser->contest_matter_id;
        $this->showModalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'contest_matter_id' => 'required',
        ];
        $this->validate();

        ContestPlanningTasksUser::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'contest_matter_id'         => $this->contest_matter_id,
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
        $data = ContestPlanningTasksUser::find($id);
        $data->delete();

        session()->flash('success', 'Tarefa excluida com sucesso.');

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
            'contest_matter_id'
        );
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
        $this->day = implode(
            "-",
            array_reverse(explode("/", $this->day))
        );
        // dd(Auth::user()->contest->contest_id);
        ContestReviews::create([
            'user_id'           => $this->user_id,
            'contest_matter_id' => $this->matter_id,
            'day'               => $this->day,
            'code'              => Str::uuid(),
            'contest_user_id'   => Auth::user()->contest->id,
            'created_by'        => Auth::user()->name,
        ]);

        session()->flash('success', 'Revisão inserida com sucesso.');

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
}
