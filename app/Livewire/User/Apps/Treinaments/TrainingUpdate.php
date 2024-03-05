<?php

namespace App\Http\Livewire\App\Treinaments;

use App\Models\Admin\Treinament\SeasonTreinament;
use Livewire\Component;

use App\Models\Admin\Treinament\Training;

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

    // Define o layout a ser usado
    protected $layout = 'treinaments';
    public function mount(SeasonTreinament $seasonTreinament)
    {
        $this->season_id = $seasonTreinament->season_id;
        $this->day = convertOnlyDate($seasonTreinament->day);
        $this->season_treinament_id = $seasonTreinament->id;
        $this->trainings = Training::where('season_treinament_id',$this->season_treinament_id)->get();
    }
    public function render()
    {
        return view('livewire.app.treinaments.training-update')->layout('layouts.' . $this->layout);
    }

    public function updateDate()
    {
        SeasonTreinament::updateOrCreate([
            'id'=> $this->season_treinament_id,
        ],[
            'day'  =>implode("-",array_reverse(explode("/",$this->day))),
        ]);
    }


}
