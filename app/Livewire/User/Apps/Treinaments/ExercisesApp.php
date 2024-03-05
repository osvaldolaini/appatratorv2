<?php

namespace App\Http\Livewire\App\Treinaments;

use App\Models\Admin\Treinament\Exercise;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class ExercisesApp extends Component
{

    public $showModalExercise = false;
    public $status = 1;
    public $title;
    public $unity;
    public $code;
    public $rules;

    public function render()
    {
        return view('livewire.app.treinaments.exercises-app');
    }

    //CREATE
    public function showModalExercise()
    {
        $this->showModalExercise = true;
    }
    public function store()
    {
        $this->rules = [
                'title'=>'required|min:4|max:255',
        ];
        $this->validate();

        Exercise::create([
            'title'     =>$this->title,
            'status'    =>1,
            'unity'     =>$this->unity,
            'user_id'   =>Auth::user()->id,
            'code'      =>Str::uuid(),
            'created_by'=>Auth::user()->name,
        ]);
        session()->flash('success','Registro criado com sucesso');
        $this->showModalExercise = false;
        $this->reset('title','unity');


    }
}
