<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Admin\Treinament\Exercise;
use App\Models\Apps\Treinament\Season;
use Livewire\Component;

use App\Models\Apps\Treinament\SeasonExercise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SeasonExercises extends Component
{
    // public Season $season;
    public $seasonExercises;
    public $search;
    public $sortField = 'limit_date';
    public $sortDirection = 'desc';
    public $showJetModal = false;
    public $modalView = false;
    public $modalCreate = false;
    public $modalEdit = false;
    public $modalExercise = false;
    public $registerId;
    public $alertSession = false;
    public $selectFilter = 'id';

    public $getStat;
    public bool $toggleStatus;

    public $detail;
    public $heads;
    public $status = 1;
    public $time;
    public $repeat;
    public $distance;
    public $code;
    public $rules;
    public $model_id;
    public $exercise_id;
    public $season_id;
    public $exercises;
    public $unity = null;

    public $titleExercise;
    public $unityExercise;
    public $season_title;


    // Define o layout a ser usado
    protected $layout = 'treinaments';

    public function getUnity()
    {
        $this->unity = Exercise::where('id', $this->exercise_id)->first()->unity;
    }

    public function mount(Season $season)
    {
        $this->season_id = $season->id;
        $this->season_title = $season->title;
        $this->seasonExercises = SeasonExercise::where('status', 1)
            ->where('season_id', $season->id)
            ->where('user_id', Auth::user()->id)
            ->get();
        $this->exercises = Exercise::where('active', 1)
            ->where('user_id', Auth::user()->id)
            ->orWhere('user_id', null)
            ->get();
    }
    public function render()
    {
        $this->seasonExercises = SeasonExercise::where('status', 1)
            ->where('season_id', $this->season_id)
            ->where('user_id', Auth::user()->id)
            ->get();

        // Gate::authorize('user');
        return view('livewire.user.apps.treinaments.season-exercises')->layout('layouts.' . $this->layout);
    }

    //CREATE
    public function showModalCreate()
    {
        $this->exercises = Exercise::where('active', 1)
            ->where('user_id', Auth::user()->id)
            ->orWhere('user_id', null)
            ->get();
        $this->modalCreate = true;
    }
    public function store()
    {
        $this->rules = [
            'exercise_id' => 'required',
        ];
        $this->validate();
        SeasonExercise::create([
            'time'          => $this->time,
            'repeat'        => $this->repeat,
            'distance'      => $this->distance,
            'exercise_id'   => $this->exercise_id,
            'season_id'     => $this->season_id,
            'user_id'       => Auth::user()->id,
            'status'        => 1,
            'code'          => Str::uuid(),
        ]);

        $this->modalCreate = false;
        $this->openAlert('success', 'Registro criado com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
    //READ
    public function showView($id)
    {
        $this->modalView = true;

        if (isset($id)) {
            $data = SeasonExercise::where('id', $id)->first();
            // dd($data);
            $this->detail = [
                'Concurso'          => $data->title,
                'Ano'               => $data->year,
                'Data do teste'     => $data->limit_date,
                'Status'            => ($data->status == 1 ? 'Ativo' : 'Inativo'),
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
    public function showModalEdit(SeasonExercise $seasonExercises)
    {
        $this->unity        = Exercise::where('id', $seasonExercises->exercise_id)->first()->unity;
        $this->model_id     = $seasonExercises->id;
        $this->time         = $seasonExercises->time;
        $this->repeat       = $seasonExercises->repeat;
        $this->distance     = $seasonExercises->distance;
        $this->modalEdit = true;
    }
    public function update()
    {
        SeasonExercise::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'time'          => $this->time,
            'repeat'        => $this->repeat,
            'distance'      => $this->distance,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');
        $this->modalEdit = false;
        $this->reset('time', 'repeat', 'distance');
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
        $data = SeasonExercise::where('id', $id)->first();
        $data->status = '0';
        $data->save();

        $this->openAlert('success', 'Registro excluido com sucesso.');

        $this->showJetModal = false;
        $this->reset('time', 'repeat', 'distance');
    }
    //CREATE
    public function showModalExercise()
    {
        $this->modalExercise = true;
    }
    public function storeExercise()
    {
        $this->rules = [
            'titleExercise' => 'required|min:4|max:255',
        ];
        $this->validate();

        Exercise::create([
            'title'     => $this->titleExercise,
            'active'    => 1,
            'unity'     => $this->unityExercise,
            'user_id'   => Auth::user()->id,
            'code'      => Str::uuid(),
            'created_by' => Auth::user()->name,
        ]);
        $this->modalExercise = false;
        $this->reset('titleExercise', 'unityExercise');
        $this->openAlert('success', 'Registro criado com sucesso.');

        $this->modalCreate = false;
        $this->showModalCreate();
    }
}
