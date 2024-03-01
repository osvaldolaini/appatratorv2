<?php

namespace App\Livewire\Admin\Question;

use App\Models\Admin\Questions\Filters\Institution;
use App\Models\Admin\Questions\Filters\Modality;
use App\Models\Admin\Questions\Questions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Str;

class QuestionCreate extends Component
{
    public $breadcrumb_title = 'NOVA QUESTÃO';
    public $text;
    public $rules;

    public $year;
    public $dificult_init;
    public $institution;
    public $modality;
    public $institution_id;
    public $modality_id;

    public function mount()
    {
        $this->institution = Institution::select('id','title')->where('active',1)->get();
        $this->modality = Modality::select('id','title')->where('active',1)->get();
    }

    public function render()
    {
        return view('livewire.admin.questions.new');
    }
    public function create()
    {
        $this->rules = [
            'text'          => 'required',
            'year'          =>'required|max:4',
            'institution_id'=>'required',
            'modality_id'   =>'required',
        ];
        $this->validate();
        $question =  Questions::create([
            'text'                      => $this->text,
            'year'                      =>$this->year,
            'dificult_init'             =>$this->dificult_init,
            'institution_id'            =>$this->institution_id,
            'modality_id'               =>$this->modality_id,
            'active'                    => 1,
            'code'                      => Str::uuid(),
            'created_by'                => Auth::user()->name,
        ]);

        return redirect()->to('/questões/configurações/' . $question->id)
            ->with('success', 'Questão criada com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
