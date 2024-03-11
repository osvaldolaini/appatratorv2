<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Admin\Treinament\Exercise;
use Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ListExercises extends Component
{
    // public Season $season;
    public $seasonExercises;

    public $showJetModal = false;
    public $modalView = false;
    public $modalCreate = false;
    public $modalEdit = false;
    public $modalExercise = false;
    public $registerId;

    public $detail;
    public $heads;
    public $active = 1;

    public $code;
    public $rules;
    public $model_id;
    public $title;
    public $unity;
    public $season_title;

    public $userExercises;


    // Define o layout a ser usado
    protected $layout = 'treinaments';

    public function render()
    {
        $this->userExercises = Exercise::where('active', 1)
            ->where('user_id', Auth::user()->id)
            ->orderBy('title','asc')
            ->get();
        return view('livewire.user.apps.treinaments.list-exercises')->layout('layouts.' . $this->layout);
    }

    //CREATE
    public function showModalCreate()
    {
        $this->userExercises = Exercise::where('active', 1)
            ->where('user_id', Auth::user()->id)
            ->get();
        $this->modalCreate = true;
    }
    public function store()
    {
        $this->rules = [
            'title' => 'required',
            'unity' => 'required',
        ];
        $this->validate();
        Exercise::create([
            'title'                 => $this->title,
            'unity'                 => $this->unity,
            'active'                => 1,
            'user_id'       => Auth::user()->id,
            'code'      =>Str::uuid(),
            'created_by'=>Auth::user()->name,
        ]);

        $this->modalCreate = false;
        $this->openAlert('success', 'Registro criado com sucesso.');
        $this->reset('title', 'unity');
    }
    //MESSAGE
    public function openAlert($active, $msg)
    {
        $this->dispatch('openAlert', $active, $msg);
    }
    //READ
    public function showView($id)
    {
        $this->modalView = true;

        if (isset($id)) {
            $data = Exercise::where('id', $id)->first();
            // dd($data);
            $this->detail = [
                'Concurso'          => $data->title,
                'Ano'               => $data->year,
                'Data do teste'     => $data->limit_date,
                'active'            => ($data->active == 1 ? 'Ativo' : 'Inativo'),
                'Criada'            => $data->created_at,
                'Criada por'        => $data->created_by,
                'Atualizada'        => $data->updated_at,
                'Atualizada por'    => $data->updated_by,
            ];
        } else {
            $this->detail = '';
        }
    }
    //UPDATE
    public function showModalEdit(Exercise $exercises)
    {
        $this->unity        = $exercises->unity;
        $this->title         = $exercises->title;
        $this->model_id = $exercises->id;
        $this->modalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'title' => 'required',
            'unity' => 'required',
        ];

        $this->validate();
        Exercise::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'title'                 => $this->title,
            'unity'                 => $this->unity,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');
        $this->modalEdit = false;
        $this->reset('title', 'unity');
    }
    //DELETE
    public function showModal($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->registerId = $id;
        } else {
            $this->registerId = '';
        }
    }
    public function delete($id)
    {
        $data = Exercise::where('id', $id)->first();
        $data->active = '0';
        $data->save();

        $this->openAlert('success', 'Registro excluido com sucesso.');

        $this->showJetModal = false;
        $this->reset('title', 'unity');
    }

}
