<?php

namespace App\Livewire\Admin\Question;

use App\Models\Admin\Questions\Filters\{
    Discipline,EducationArea,ExaminingBoard,Institution,
    Level,Matter,Modality,OccupationArea,Office,SubMatter
};


use App\Models\Admin\Questions\Questions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class QuestionCorrect extends Component
{
    public $breadcrumb_title = 'QUESTÃO Nº #';

    public $active = 1;
    public $right_answer;
    public $question;
    public $id;

    protected $rules = [
        'right_answer' =>'required',
    ];

    public function mount(Questions $questions)
    {
        $this->id     = $questions->id;
        $this->right_answer    = $questions->right_answer;

        $this->question = $questions;
        $this->breadcrumb_title  .= str_pad($questions->id, 5, '0', STR_PAD_LEFT);
    }
    public function update()
    {
        $this->rules = [
            'right_answer' => 'required',
        ];
        $this->validate();
        Questions::updateOrCreate([
            'id'        =>$this->id,
        ],[
            'right_answer'      =>$this->right_answer,
            'updated_by'=>Auth::user()->name,
        ]);

        return redirect()->to('/questões')
        ->with('success','Questão atualizada com sucesso.');
    }

    public function render()
    {
        return view('livewire.admin.questions.correct');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
