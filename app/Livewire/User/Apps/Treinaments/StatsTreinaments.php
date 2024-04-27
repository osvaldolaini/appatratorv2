<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Apps\Treinament\Season;
use App\Models\Apps\Treinament\SeasonTreinament;
use App\Models\Apps\Treinament\Training;
use App\Models\Admin\Treinament\Exercise;
use App\Models\Apps\Treinament\SeasonExercise;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class StatsTreinaments extends Component
{
    // Define o layout a ser usado
    protected $layout = 'treinaments';
    public $days = [];
    public $hits = [];
    public $seasonTreinaments;
    public $trainings = [];
    public $stats = [];

    public function convert($date, $v)
    {
        if ($v == 1) {
            return date('d/m/Y',  strtotime($date));
        } else {
            return date('Y-m-d',  strtotime($date));
        }
    }
    public function mount(Season $season)
    {
        $this->seasonTreinaments = SeasonTreinament::where('status', 1)
            ->where('season_id', $season->id)
            ->where('user_id', Auth::user()->id)
            ->orderBy('day','asc')
            ->get();

        foreach ($this->seasonTreinaments as $seasonTreinament) {

            // dd($seasonTreinament);
            $this->trainings = Training::where('season_treinament_id', $seasonTreinament->id)->get();


            foreach ($this->trainings as $training) {
                $exer[] = $training->exercise->id;
            }
            // dd($exer);
            $exer = array_values(array_unique($exer));
            for ($i = 0; $i < count($exer); $i++) {
                if ($exer[$i]) {
                    $e = Exercise::where('id', $exer[$i])->first();
                    $trns = Training::orderBy('day','asc')
                    ->where('exercise_id', $exer[$i])
                    ->get();

                    $d = $trns->map(
                        fn($trn)=>[
                            'day' => SeasonTreinament::where('id',$trn->season_treinament_id)
                            ->first()->day,
                        ]
                    )->sortBy('day')->pluck('day')->toArray();

                    // dd($d);

                    foreach ($trns as $training) {
                        if ($training->exercise->unity == 'repeticao') {
                            $qtd = $trns->map(
                                fn ($trn) => [
                                    'repeat' => $trn->repeat,
                                ]
                            )->sortBy('day')->pluck('repeat')->toArray();
                        }elseif($training->exercise->unity == 'cm' or $training->exercise->unity == 'm' or $training->exercise->unity == 'km') {
                            $qtd = $trns->map(
                                fn ($trn) => [
                                    'distance' => $trn->distance,
                                ]
                            )->sortBy('day')->pluck('distance')->toArray();
                        }elseif ($training->exercise->unity == 'min') {
                            $qtd = $trns->map(
                                fn ($trn) => [
                                    'time' => $trn->timeChart,
                                ]
                            )->sortBy('day')->pluck('time')->toArray();
                        }
                    }
                }
                $objetive = SeasonExercise::where('user_id',$seasonTreinament->user_id)
                ->where('season_id', $seasonTreinament->season_id)->where('exercise_id',$e->id)->first();

                if ($objetive->repeat) {
                    $target = $objetive->repeat;
                }
                if ($objetive->time) {
                    $target = $objetive->time;
                }
                if ($objetive->distance) {
                    $target = $objetive->distance;
                }

                $this->stats[$exer[$i]] = array(
                    'id'=>$e->id,
                    'title'=>$e->title,
                    'labels'=>$d,
                    'qtd'=>$qtd,
                    'target'=>$target .' ('.$objetive->exercise->unity.')',

                );
            }
        }
        //Limpara os resultado nulos
        foreach ($this->stats as $chave => $valor) {
            $this->stats[$chave]['qtd'] = array_filter($valor['qtd'], function($item) {
                return !is_null($item);
            });
            $this->stats[$chave]['labels'] = array_filter($valor['qtd'], function($item) {
                return !is_null($item);
            });
        }
    }

    public function render()
    {
        return view('livewire.user.apps.treinaments.stats')->layout('layouts.' . $this->layout);
    }
}
