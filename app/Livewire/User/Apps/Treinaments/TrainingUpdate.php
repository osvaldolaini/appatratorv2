<?php

namespace App\Livewire\User\Apps\Treinaments;

use App\Models\Apps\Treinament\SeasonTreinament;
use Livewire\Component;

use App\Models\Apps\Treinament\Training;

class TrainingUpdate extends Component
{
    public $exercise_id;
    public $season_id;
    public $season_treinament_id;
    public $day;
    public $time;
    public $repeat;
    public $distance;
    public $trainings;
    public $season_title;

    // Define o layout a ser usado
    protected $layout = 'treinaments';
    public function mount(SeasonTreinament $seasonTreinament)
    {
        $this->season_id = $seasonTreinament->season_id;
        $this->season_title = $seasonTreinament->season->title;
        $this->day = $seasonTreinament->day;
        $this->season_treinament_id = $seasonTreinament->id;
        $this->trainings = Training::where('season_treinament_id',$this->season_treinament_id)->get();
    }
    public function render()
    {
        return view('livewire.user.apps.treinaments.training-update')->layout('layouts.' . $this->layout);
    }

    public function updateDate()
    {
        SeasonTreinament::updateOrCreate([
            'id' => $this->season_treinament_id,
        ], [
            'day'  => $this->day,
        ]);
        return redirect()->to(
            '/app-de-treinamento/concursos/editar-treino/' . $this->season_treinament_id,
            'Data atualizada com sucesso.'
        );
    }

}
