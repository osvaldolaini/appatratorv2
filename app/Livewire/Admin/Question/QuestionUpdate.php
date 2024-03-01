<?php

namespace App\Livewire\Admin\Question;

use App\Models\Admin\Questions\Questions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuestionUpdate extends Component
{
    public $breadcrumb_title = 'QUESTÃO Nº #';

    public $active = 1;
    public $text;
    public $id;

    protected $rules = [
        'text' =>'required',
    ];
    public function mount(Questions $questions)
    {
        $this->id     = $questions->id;
        $this->text    = $questions->text;
        $this->breadcrumb_title  .= str_pad($questions->id, 5, '0', STR_PAD_LEFT);
    }
    public function update()
    {
        $this->rules = [
            'text' => 'required',
        ];
        $this->validate();
        $question = Questions::updateOrCreate([
            'id'        =>$this->id,
        ],[
            'text'      =>$this->text,
            'updated_by'=>Auth::user()->name,
        ]);

        return redirect()->to('/questões')
        ->with('success','Questão atualizada com sucesso.');
    }

    public function render()
    {
        return view('livewire.admin.questions.update');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
