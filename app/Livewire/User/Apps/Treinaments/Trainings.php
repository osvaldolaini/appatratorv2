<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Apps\Treinament\Season;
use App\Models\Apps\Treinament\SeasonExercise;
use App\Models\Apps\Treinament\SeasonTreinament;
use Illuminate\Support\Str;
use Livewire\Component;

use App\Models\Apps\Treinament\Training;
use Illuminate\Support\Facades\Auth;

class Trainings extends Component
{
    public $seasonExercises;
    public $seasonTreinament;

    public function mount(Season $season)
    {
            $this->seasonTreinament = SeasonTreinament::create([
                'day'           =>date('d/m/Y'),
                'season_id'     =>$season->id,
                'user_id'       =>Auth::user()->id,
                'status'        =>1,
                'code'          =>Str::uuid(),
            ]);

            $this->seasonExercises = SeasonExercise::where('status',1)->where('season_id',$season->id)
            ->get();
            foreach ($this->seasonExercises as $key) {
                Training::create([
                    'season_treinament_id'  => $this->seasonTreinament->id,
                    'exercise_id'           => $key->exercise_id,
                ]);
            }
            return redirect()->to('/app-de-treinamento/concursos/editar-treino/'.$this->seasonTreinament->id);
    }

    // public function render()
    // {
    //     return redirect()->to('/app-de-treinamento/concurso/editar-treino/'.$this->model_id);
    // }

}
