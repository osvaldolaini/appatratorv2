<?php

namespace App\Livewire\User\Apps\Treinaments;

use Livewire\Component;
use App\Models\Apps\Treinament\Training;

class TrainingsComponent extends Component
{
    public $seasonExercises;
    public $training;
    public $repeat;
    public $distance;
    public $exercise_id;
    public $model_id;

    public function mount(Training $training)
    {
        $this->model_id =  $training->id;
        $this->repeat = $training->repeat;
        $this->distance = $training->distance;
        $this->exercise_id = $training->exercise_id;
        $this->training = $training;
    }

    public function render()
    {
        return view('livewire.user.apps.treinaments.trainings-component');
    }

    public function update()
    {
        Training::updateOrCreate([
            'id'=> $this->model_id,
        ],[
            'repeat'        =>$this->repeat,
            'distance'      =>$this->distance,
            'exercise_id'   =>$this->exercise_id,
        ]);
    }
}
