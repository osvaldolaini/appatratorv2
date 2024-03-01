<?php

namespace App\Livewire\Admin\Question;

use App\Models\Admin\Questions\Filters\{
    Discipline,
    EducationArea,
    ExaminingBoard,
    Institution,
    Level,
    Matter,
    Modality,
    OccupationArea,
    Office,
    SubMatter
};

use App\Models\Admin\Questions\Questions;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Str;

class QuestionConfigs extends Component
{
    //CONFIGURAÇÕES
    public $id;
    public $breadcrumb_title = 'QUESTÃO Nº #';

    public $year;
    public $dificult_init;

    //Filtros
    public $educationArea;
    public $examiningBoard;
    public $institution;
    public $level;
    public $modality;
    public $occupationArea;
    public $office;
    public $discipline;

    public $institution_id;
    public $examining_board_id;
    public $occupation_area_indice_id;
    public $education_area_indice_id;
    public $office_id;
    public $level_id;
    public $modality_id;
    public $discipline_id;
    public $matter_id;
    public $sub_matter_id;

    public $matters;
    public $subMatters = null;

    protected $rules = [
        'year'                      => 'required|max:4',
        'dificult_init'             => 'required',
        'institution_id'            => 'required|integer|max:11',
        'modality_id'               => 'required|integer|max:11',
    ];
    public function mount(Questions $questions)
    {
        $this->breadcrumb_title  .= str_pad($questions->id, 5, '0', STR_PAD_LEFT);
        $this->id = $questions->id;
        $this->year = $questions->year;
        $this->dificult_init = $questions->dificult_init;
        $this->institution_id = $questions->institution_id;
        $this->examining_board_id = $questions->examining_board_id;
        $this->occupation_area_indice_id = $questions->occupation_area_indice_id;
        $this->education_area_indice_id = $questions->education_area_indice_id;
        $this->office_id = $questions->office_id;
        $this->level_id = $questions->level_id;
        $this->modality_id = $questions->modality_id;
        $this->discipline_id = $questions->discipline_id;
        $this->matter_id = $questions->matter_id;
        $this->sub_matter_id = $questions->sub_matter_id;

        $this->educationArea    = EducationArea::select('id', 'title')->where('active', 1)->get();
        $this->examiningBoard   = ExaminingBoard::select('id', 'title')->where('active', 1)->get();
        $this->institution      = Institution::select('id', 'title')->where('active', 1)->get();
        $this->level            = Level::select('id', 'title')->where('active', 1)->get();
        $this->modality         = Modality::select('id', 'title')->where('active', 1)->get();
        $this->occupationArea   = OccupationArea::select('id', 'title')->where('active', 1)->get();
        $this->office           = Office::select('id', 'title')->where('active', 1)->get();
        $this->discipline       = Discipline::select('id', 'title')->where('active', 1)->get();
        if ($this->matter_id) {
            $this->matters          = $this->discipline->find($this->discipline_id)->matter;
        }
        if ($this->sub_matter_id) {
            $this->subMatters       = $this->matters->find($this->matter_id)->subMatter;
        }
    }
    public function submit()
    {
        $this->validate();

        Questions::updateOrCreate([
            'id' => $this->id,
        ], [
            'year'                      => $this->year,
            'dificult_init'             => $this->dificult_init,
            'institution_id'            => $this->institution_id,
            'examining_board_id'        => $this->examining_board_id,
            'occupation_area_indice_id' => $this->occupation_area_indice_id,
            'education_area_indice_id'  => $this->education_area_indice_id,
            'office_id'                 => $this->office_id,
            'level_id'                  => $this->level_id,
            'modality_id'               => $this->modality_id,
            'discipline_id'             => $this->discipline_id,
            'matter_id'                 => $this->matter_id,
            'sub_matter_id'             => $this->sub_matter_id,
            'updated_by' => Auth::user()->name,
        ]);
        if ($this->id) {

            $this->openAlert('success', 'Registro atualizado com sucesso.');
        }
    }

    public function render()
    {
        return view('livewire.admin.questions.config');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
