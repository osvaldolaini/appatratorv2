<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestMatter;
use App\Models\Apps\Mentoring\ContestQuestions;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;

class MentoringQuestionsUser extends Component
{
    use WithPagination;
    public $showJetModal = false;
    public $modalCreate = false;
    public $modalEdit = false;
    public $alertSession = false;
    public $showQuestionsModal = false;

    public $active = 1;
    public $rules;
    public $heads;
    public $model_id;
    public $user_id;
    public $contest_user_id;

    public $matter_id;
    public $day;
    public $qtd;
    public $hits;

    public $contentMatter;


    public function mount($matter)
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->contentMatter = ContestMatter::find($matter)->first();
        $this->matter_id = $matter;
        $this->user_id = Auth::user()->id;
        $this->day = date("d/m/Y");
    }

    public function render()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $questions = DB::table('contest_questions')
        ->where('user_id',$this->user_id)
        ->where('contest_matter_id',$this->matter_id)
        ->orderBy('day', 'desc')->paginate(5);

        return view('livewire.user.apps.mentoring.mentoring-questions-user',
        [
                'questions'      => $questions,
            ]);
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
    public function showModalCreate()
    {
        $this->modalCreate = true;
    }
    public function store()
    {
        $this->rules = [
            'qtd' => 'required',
            'hits' => 'required',
        ];
        $this->validate();
        $this->day = implode(
            "-",
            array_reverse(explode("/", $this->day))
        );
        // dd(Auth::user()->contest->contest_id);
        ContestQuestions::create([
            'user_id'           => $this->user_id,
            'contest_matter_id' => $this->matter_id,
            'qtd'               => $this->qtd,
            'hits'              => $this->hits,
            'day'               => $this->day,
            'contest_user_id'   => Auth::user()->contest->id,
            'created_by'        => Auth::user()->name,
        ]);
        session()->flash('success', 'Endereço criado com sucesso');

        $this->alertSession = true;
        $this->modalCreate = false;
        $this->reset('qtd','hits','day');
        $this->dispatch('new-question');
    }

    // //UPDATE
    // public function showModalEdit(ContestQuestions $contestQuestions)
    // {
    //     $this->model_id=$contestQuestions->id;
    //     $this->qtd     = $contestQuestions->qtd;
    //     $this->hits    = $contestQuestions->hits;
    //     $this->day     = convertOnlyDate($contestQuestions->day);
    //     $this->showModalEdit = true;
    // }
    // public function update()
    // {
    //     $this->rules = [
    //         'qtd' => 'required',
    //         'hits' => 'required',
    //     ];
    //     $this->validate();
    //     $this->day = implode(
    //         "-",
    //         array_reverse(explode("/", $this->day))
    //     );
    //     ContestQuestions::updateOrCreate([
    //         'id' => $this->model_id,
    //     ], [
    //         'qtd'               => $this->qtd,
    //         'hits'              => $this->hits,
    //         'day'               => $this->day,
    //         'updated_by' => Auth::user()->name,
    //     ]);

    //     session()->flash('success', 'Endereço atualizado com sucesso');

    //     $this->alertSession = true;
    //     $this->showModalEdit = false;
    //     $this->reset('qtd','hits');
    // }
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
        $data = ContestQuestions::find($id);
        $data->delete();

        session()->flash('success', 'Endereço excluido com sucesso.');

        $this->alertSession = true;
        $this->showJetModal = false;
        $this->reset('qtd','hits');
    }

    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }

}
