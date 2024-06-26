<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Apps\Treinament\Season;
use App\Models\Apps\Treinament\SeasonTreinament;
use App\Models\Apps\Treinament\SeasonExercise;
use App\Models\Apps\Treinament\Training;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use Livewire\Component;

class SeasonTreinaments extends Component
{
    // public Season $season;
    public $seasonTreinaments;
    public $seasonTreinament;
    public $seasonExercises;
    public $treinigs;
    public $search;
    public $sortField = 'limit_date';
    public $sortDirection = 'desc';
    public $showJetModal = false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $registerId;
    public $alertSession = false;
    public $selectFilter = 'id';
    public $season_title;

    public $detail;
    public $heads;
    public $status = 1;
    public $day;
    public $code;
    public $rules;
    public $model_id;
    public $season_id;
    public $exercises;
    public $unity = null;

    public $vouchers;
    public $access;

    // Define o layout a ser usado
    protected $layout = 'treinaments';

    public function mount(Season $season)
    {
        $this->season_id = $season->id;
        $this->season_title = $season->title;
        $this->seasonTreinaments = SeasonTreinament::where('status', 1)
            ->where('season_id', $this->season_id)
            ->where('user_id', Auth::user()->id)
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
        $this->seasonTreinaments = SeasonTreinament::where('status', 1)
            ->where('season_id', $this->season_id)
            ->where('user_id', Auth::user()->id)
            ->orderBy('day','desc')
            ->get();
        // Gate::authorize('user');
        return view('livewire.user.apps.treinaments.season-treinament')->layout('layouts.' . $this->layout);
    }
    //CREATE
    public function showModalCreate()
    {
        $this->showModalCreate = true;
        $this->seasonTreinament = SeasonTreinament::create([
            'day'           => date('Y-m-d'),
            'season_id'     => $this->season_id,
            'user_id'       => Auth::user()->id,
            'status'        => 1,
            'code'          => Str::uuid(),
        ]);
        $this->model_id     =  $this->seasonTreinament->id;
        $this->seasonTreinaments = SeasonTreinament::where('status', 1)
            ->where('season_id', $this->season_id)
            ->where('user_id', Auth::user()->id)
            ->get();

        $this->seasonExercises = SeasonExercise::where('status', 1)->where('season_id', $this->season_id)
            ->get();
        $this->day = date("d/m/Y");
    }
    public function store()
    {
        SeasonTreinament::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'day' => $this->day,
        ]);
        $this->openAlert('success', 'Registro excluido com sucesso.');
    }
    //READ
    public function showView($id)
    {
        $this->showModalView = true;

        if (isset($id)) {
            $data = SeasonTreinament::where('id', $id)->first();
            // dd($data);
            $this->detail = [
                'Data'     => $data->day,
            ];
            $seasonExercises = Training::where('season_treinament_id', $data->id)
                ->get();

            if ($seasonExercises) {
                foreach ($seasonExercises as $key) {

                    if ($key->exercise->unity == 'repeticao') {
                        $this->exercises[$key->exercise->title] =
                            Training::where('exercise_id', $key->exercise_id)->where('season_treinament_id', $data->id)->orderBy('repeat', 'desc')->first()->repeat;
                    } elseif ($key->exercise->unity == 'cm' or $key->exercise->unity == 'm' or $key->exercise->unity == 'km') {
                        $this->exercises[$key->exercise->title] =
                            Training::where('exercise_id', $key->exercise_id)->where('season_treinament_id', $data->id)->orderBy('distance', 'desc')->first()->distance;
                    } elseif ($key->exercise->unity == 'min') {

                        $this->exercises[$key->exercise->title] =
                            Training::where('exercise_id', $key->exercise_id)->where('season_treinament_id', $data->id)->orderBy('time', 'desc')->first()->time;
                    }
                }
            }
        } else {
            $this->exercises = '';
            $this->detail = '';
        }
    }
    //UPDATE
    public function showModalEdit(SeasonTreinament $seasonTreinament)
    {
        $this->model_id     = $seasonTreinament->id;
        $this->day          = convertOnlyDate($seasonTreinament->day);
        $this->treinigs     = Training::where('season_treinament_id', $seasonTreinament->id)
            ->get();
        $this->showModalEdit = true;
    }

    public function update()
    {
        $this->day = implode("-", array_reverse(explode("/", $this->day)));
        SeasonTreinament::updateOrCreate([
            'id'  => $this->model_id,
        ], [
            'day' => $this->day,
        ]);

        $this->openAlert('success', 'Registro excluido com sucesso.');
        $this->showModalEdit = false;
        $this->reset('day');
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
        $data = SeasonTreinament::where('id', $id)->first();
        $data->delete();
        $this->openAlert('success', 'Treino excluido com sucesso.');
        $this->showJetModal = false;
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
