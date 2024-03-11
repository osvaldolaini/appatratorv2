<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Apps\Treinament\Season;
use App\Models\Apps\Treinament\SeasonExercise;
use App\Models\Apps\Treinament\SeasonTreinament;
use App\Models\Apps\Treinament\Training;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SeasonUser extends Component
{
    use WithPagination;

    // public Season $season;
    public $season;
    public $search;
    public $sortField = 'limit_date';
    public $sortDirection = 'desc';
    public $showJetModal = false;
    public $showModalView = false;
    public $modalCreate = false;
    public $modalEdit = false;
    public $registerId;
    public $selectFilter = 'id';

    public $getStat;
    public bool $toggleStatus;

    public $detail;
    public $exercises;
    public $heads;
    public $status = 1;
    public $title;
    public $year;
    public $limit_date;
    public $code;
    public $rules;
    public $model_id;
    public $vouchers;
    public $access;

    // Define o layout a ser usado
    protected $layout = 'treinaments';

    public function mount()
    {
        $this->season = SeasonTreinament::where('user_id', Auth::user()->id)
            ->where('status', 1)
            // ->orderBy('limit_date','desc')
            ->get();

        $this->vouchers = Auth::user()->vouchers
            ->where('active', 1)
            ->where('limit_access', '>=', date('Y-m-d h:i:s'));
        foreach ($this->vouchers as $voucher) {
            if ($voucher->application == 'treinament') {
                $this->access = true;
            }
        }
    }
    public function render()
    {
        $this->season = Season::where('user_id', Auth::user()->id)
            ->where('status', 1)
            // ->orderBy('limit_date','desc')
            ->get();
        return view('livewire.user.apps.treinaments.season')->layout('layouts.' . $this->layout);
    }

    //CREATE
    public function showModalCreate()
    {
        $this->modalCreate = true;
    }
    public function store()
    {
        $this->rules = [
            'title' => 'required|min:2|max:255',
        ];
        $this->validate();
        $this->limit_date = implode("-", array_reverse(explode("/", $this->limit_date)));
        Season::create([
            'title'     => $this->title,
            'year'      => $this->year,
            'limit_date'     => $this->limit_date,
            'user_id'   => Auth::user()->id,
            'status'    => 1,
            'code'      => Str::uuid(),
            'created_by' => Auth::user()->name,
        ]);

        $this->modalCreate = false;
        $this->reset('title', 'limit_date', 'year');
        $this->openAlert('success', 'Registro excluido com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
    //READ
    public function showView($id)
    {
        $this->showModalView = true;

        if (isset($id)) {
            $data = Season::where('id', $id)->first();
            // dd($data);
            $this->detail = [
                'Concurso'          => $data->title,
                'Ano'               => $data->year,
                'Data do teste'     => $data->limit_date,
            ];
            $seasonExercises = SeasonExercise::where('status', 1)
                ->where('season_id', $data->id)
                ->where('user_id', Auth::user()->id)
                ->get();
            if ($seasonExercises) {
                foreach ($seasonExercises as $key) {
                    if ($key->exercise->unity == 'repeticao') {
                        $this->exercises[$key->exercise->title] =
                            Training::where('exercise_id', $key->exercise_id)->orderBy('repeat', 'desc')->first()->repeat;
                    } elseif ($key->exercise->unity == 'cm' or $key->exercise->unity == 'm' or $key->exercise->unity == 'km') {
                        $this->exercises[$key->exercise->title] =
                            Training::where('exercise_id', $key->exercise_id)->orderBy('distance', 'desc')->first()->distance;
                    } elseif ($key->exercise->unity == 'min') {
                        $this->exercises[$key->exercise->title] =
                            Training::where('exercise_id', $key->exercise_id)->orderBy('time', 'desc')->first()->time;
                    }
                }
            }
        } else {
            $this->exercises = '';
            $this->detail = '';
        }
    }
    //UPDATE
    public function showModalEdit(Season $season)
    {
        $this->model_id = $season->id;
        $this->title    = $season->title;
        $this->year     = $season->year;
        $this->limit_date    = $season->limit_date;
        $this->status   = $season->status;
        $this->modalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'title' => 'required|min:2|max:255',
        ];
        $this->validate();
        $this->limit_date = implode("-", array_reverse(explode("/", $this->limit_date)));
        Season::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'title'     => $this->title,
            'year'      => $this->year,
            'limit_date'     => $this->limit_date,
            // 'user_id'   =>Auth::user()->id,
            'status'    => $this->status,
            'updated_by' => Auth::user()->name,
        ]);

        $this->modalEdit = false;
        $this->reset('title', 'limit_date', 'year');
        $this->openAlert('success', 'Registro atualizado com sucesso.');
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
        $data = Season::where('id', $id)->first();
        $data->status = '0';
        $data->save();

        $this->openAlert('success', 'Registro excluido com sucesso.');
        $this->showJetModal = false;
        $this->reset('title');
    }



    //EXTRAS
    //Ordena os colunas nas tabelas
    public function sortBy($field)
    {
        if ($field == $this->sortField) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    //pega o status do registro
    public function getStatus($id)
    {
        return Season::where('id', $id)->first()->status;
    }
}
