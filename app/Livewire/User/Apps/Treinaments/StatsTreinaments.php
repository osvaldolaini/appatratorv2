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
    public $labels = [];
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
            ->get();

        $this->labels = $this->seasonTreinaments->map(
            fn ($seasonTreinament) => [
                'day' => $this->convert($seasonTreinament->day, 1),
            ]
        )->pluck('day')->toArray();

        // dd($this->seasonTreinaments);
        foreach ($this->seasonTreinaments as $seasonTreinament) {

            // dd($seasonTreinament);
            $this->trainings = Training::where('season_treinament_id', $seasonTreinament->id)->get();
            // dd($this->trainings);

            foreach ($this->trainings as $training) {
                $exer[] = $training->exercise->id;
            }
            // dd(count($exer));
            $exer = array_values(array_unique($exer));

            for ($i = 0; $i < count($exer); $i++) {
                if ($exer[$i]) {
                    $e = Exercise::where('id', $exer[$i])->first();
                    $trns = Training::where('exercise_id', $exer[$i])->get();
                    $d = $trns->map(
                        fn($trn)=>[
                            'day' => SeasonTreinament::orderBy('day','desc')->where('id',$trn->season_treinament_id)
                            ->first()->day,
                        ]
                    )->pluck('day')->toArray();

                    foreach ($trns as $training) {
                        if ($training->exercise->unity == 'repeticao') {
                            $qtd = $trns->map(
                                fn ($trn) => [
                                    'repeat' => $trn->repeat,
                                ]
                            )->pluck('repeat')->toArray();
                        }
                        if ($training->exercise->unity == 'cm' or $training->exercise->unity == 'm' or $training->exercise->unity == 'km') {
                            $qtd = $trns->map(
                                fn ($trn) => [
                                    'distance' => $trn->distance,
                                ]
                            )->pluck('distance')->toArray();
                        }
                        if ($training->exercise->unity == 'min') {
                            $qtd = $trns->map(
                                fn ($trn) => [
                                    'time' => $trn->time,
                                ]
                            )->pluck('time')->toArray();
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
    }

    public function render()
    {
        // dd($this->stats);
        return view('livewire.user.apps.treinaments.stats')->layout('layouts.' . $this->layout);
    }
}
