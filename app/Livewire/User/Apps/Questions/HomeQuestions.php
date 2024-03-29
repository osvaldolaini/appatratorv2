<?php

namespace App\Livewire\User\Apps\Questions;

use App\Models\Admin\Questions\Alternatives;
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
use App\Models\Admin\Questions\Responses;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Str;
use Livewire\WithPagination;

class HomeQuestions extends Component
{
    use WithPagination;
    //Filtros
    public $year = [];
    public $dificult_init = [];
    public $educationArea;
    public $examiningBoard;
    public $institution;
    public $level;
    public $modality;
    public $occupationArea;
    public $office;
    public $discipline;
    public $matters;
    public $subMatters;

    public $filterdiscipline;
    public $filtermatters;
    public $filtersubMatters;

    public $institution_ids= [];
    public $occupation_area_ids= [];
    public $examining_board_ids= [];
    public $level_ids= [];
    public $modality_ids= [];
    public $education_area_ids= [];
    public $office_ids= [];
    public $discipline_ids= [];
    public $matter_ids= [];
    public $sub_matter_ids= [];
    // Define o layout a ser usado
    protected $layout = 'questions';
    public $questions;
    public $filters;
    public $vouchers;
    public $access;
    public $right_answer;
    public $showCorrectResponse = false;

    public $alternative_id;


    public $selectedFilters = [];
    public $selectedFiltersMask = [];

    public $dropdownOpen = false;

    public $rules;
    protected $messages = [
        'alternative_id.required' => 'Escolha uma alternativa.',
    ];

    public function mount()
    {
        $this->educationArea = EducationArea::select('id', 'title')->where('active', 1)->get();
        $this->examiningBoard = ExaminingBoard::select('id', 'title')->where('active', 1)->get();
        $this->institution = Institution::select('id', 'title')->where('active', 1)->get();
        $this->level = Level::select('id', 'title')->where('active', 1)->get();
        $this->modality = Modality::select('id', 'title')->where('active', 1)->get();
        $this->occupationArea = OccupationArea::select('id', 'title')->where('active', 1)->get();
        $this->office = Office::select('id', 'title')->where('active', 1)->get();
        $this->discipline = Discipline::select('id', 'title')->where('active', 1)->get();
        $this->questions = Questions::where('active',1)->where('text','!=','')->inRandomOrder()->get();
    }
    public function render()
    {
        $this->filters=count($this->selectedFilters);

        // $this->search();

        $this->vouchers = Auth::user()->vouchers
                        ->where('active',1)
                        ->where('limit_access','>=', date('Y-m-d h:i:s'));
        foreach ($this->vouchers as $voucher) {
            if ($voucher->application == 'questions'){
                $this->access = true;
            }
        }
        return view('livewire.user.apps.questions.home-questions')
            ->layout('layouts.' . $this->layout);
    }
    public function updateSelectedFilters($id, $title, $table)
    {
        $insert=true;
        $i=0;
        if (count($this->selectedFiltersMask) > 0) {
            $idMask = $table.'_'.$title.'_'.$id;
            foreach ($this->selectedFiltersMask as $key) {
                if(in_array($idMask,$key)){
                    unset($this->selectedFiltersMask[$i]);
                    unset($this->selectedFilters[$i]);
                    $insert=false;
                }
                $i++;
            }
        }

        $this->selectedFiltersMask = array_values($this->selectedFiltersMask);
        $this->selectedFilters = array_values($this->selectedFilters);
        if($insert==true){
            $this->selectedFiltersMask[] = [
                'idMask'=> $table.'_'.$title.'_'.$id,
                'title' => $title,
                'id' => $id,
                'table' => $table
            ];
            $this->selectedFilters[] = [
                'idMask'=> $table.'_'.$title.'_'.$id,
                'id' => $id,
                'table' => $table
            ];
        }


        if($table=='disciplines'){
            $this->filterdiscipline = Discipline::select('id', 'title')->where('active', 1)->get();
            $this->filtermatters = $this->filterdiscipline->find($id)->matter;
        }
        if($table=='matters'){
            $this->filtermatters = Matter::select('id', 'title')->where('active', 1)->get();
            $this->filtersubMatters = $this->filtermatters->find($id)->subMatter;
        }
        $this->search();
        $this->dispatch('updateSelectedFilters', $this->selectedFiltersMask);

    }

    public function search()
    {
        $this->questions = null;
        $this->resetFilters();
        $query = Questions::query();

        if ($this->selectedFilters) {
                foreach ($this->selectedFilters as $key) {
                    if ($key['table'] == 'year') {
                        $this->year[] = $key['id'];
                    }
                    if ($key['table']  == 'dificult_init') {
                        $this->dificult_init = $key['id'];
                    }
                    if ($key['table']  == 'intitution') {
                        $this->institution_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'education_areas') {
                        $this->occupation_area_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'examining_boards') {
                        $this->examining_board_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'levels') {
                        $this->level_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'modalities') {
                        $this->modality_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'occupation_areas') {
                        $this->education_area_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'offices') {
                        $this->office_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'disciplines') {
                        $this->discipline_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'matters') {
                        $this->matter_ids[] = $key['id'];
                    }
                    if ($key['table']  == 'sub_matters') {
                        $this->sub_matter_ids[] = $key['id'];
                    }
                }

                if (!empty($this->year)) {
                    $query->whereIn('year', $this->year);
                }
                if (!empty($this->dificult_init)) {
                    $query->whereIn('dificult_init', $this->dificult_init);
                }
                if (!empty($this->institution_ids)) {
                    $query->whereHas('intitution', function ($query) {
                        $query->whereIn('id', $this->institution_ids);
                    });
                }
                if (!empty($this->occupation_area_ids)) {
                    $query->whereHas('education_areas', function ($query) {
                        $query->whereIn('id', $this->occupation_area_ids);
                    });
                }
                if (!empty($this->examining_board_ids)) {
                    $query->whereHas('examining_boards', function ($query) {
                        $query->whereIn('id', $this->examining_board_ids);
                    });
                }
                if (!empty($this->level_ids)) {
                    $query->whereHas('levels', function ($query) {
                        $query->whereIn('id', $this->level_ids);
                    });
                }
                if (!empty($this->modality_ids)) {
                    $query->whereHas('modalities', function ($query) {
                        $query->whereIn('id', $this->modality_ids);
                    });
                }
                if (!empty($this->education_area_ids)) {
                    $query->whereHas('occupation_areas', function ($query) {
                        $query->whereIn('id', $this->education_area_ids);
                    });
                }
                if (!empty($this->office_ids)) {
                    $query->whereHas('offices', function ($query) {
                        $query->whereIn('id', $this->office_ids);
                    });
                }
                if (!empty($this->discipline_ids)) {
                    $query->whereHas('disciplines', function ($query) {
                        $query->whereIn('id', $this->discipline_ids);
                    });
                }
                if (!empty($this->matter_ids)) {
                    $query->whereHas('matters', function ($query) {
                        $query->whereIn('id', $this->matter_ids);
                    });
                }
                if (!empty($this->sub_matter_ids)) {
                    $query->whereHas('sub_matters', function ($query) {
                        $query->whereIn('id', $this->sub_matter_ids);
                    });
                }
        }

        $this->questions = $query->with([
                'disciplines',
                'intitution',
                'examining_boards',
                'disciplines',
                'matters',
                'offices',
                'alternatives',
                'levels',
                'modalities',
                'occupation_areas',
        ])
        ->where('active', 1)
        ->inRandomOrder()
        ->get();
    }

    public function resetFilters()
    {
        $this->year = [];
        $this->dificult_init = [];
        $this->institution_ids= [];
        $this->occupation_area_ids= [];
        $this->examining_board_ids= [];
        $this->level_ids= [];
        $this->modality_ids= [];
        $this->education_area_ids= [];
        $this->office_ids= [];
        $this->discipline_ids= [];
        $this->matter_ids= [];
        $this->sub_matter_ids= [];
    }

    public function submit()
    {
        $this->rules = [
            'alternative_id' => 'required',
        ];

        $this->validate();
        $alternative = Alternatives::select('question_id')->where('id',$this->alternative_id)->first();

        $response =  Responses::create([
            'user_id'           =>Auth::user()->id,
            'alternative_id'    =>$this->alternative_id,
            'question_id'       =>$alternative->question_id,
            'code'              =>Str::uuid(),
        ]);

        $msgcorrect = array(
            'Acertou mizeravi','Boa 06','Excelente'
        );
        $msgcerror = array(
            'Errooouuuu','Não foi dessa vez','Tente novamente'
        );
        shuffle($msgcorrect);
        shuffle($msgcerror);
        if($response->alternatives->correct == true){
            $this->openAlert('success', $msgcorrect[0]);
            // $this->refresh(true);
        }else{
            $this->right_answer = $alternative->question->right_answer;
            if ($this->right_answer){
                $this->showCorrectResponse = true;
                $this->right_answer = $alternative->question->right_answer;
            }
            $this->openAlert('error', $msgcerror[0]);
        }
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }

}
