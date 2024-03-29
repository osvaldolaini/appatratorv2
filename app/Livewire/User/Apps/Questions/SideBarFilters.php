<?php

namespace App\Livewire\User\Apps\Questions;

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

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class SidBarFilters extends Component
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

    public $selectedFilters = [];
    public $selectedFiltersMask = [];

    public $dropdownOpen = false;

    public function mount()
    {
        $this->educationArea = EducationArea::select('id', 'title')->where('status', 1)->get();
        $this->examiningBoard = ExaminingBoard::select('id', 'title')->where('status', 1)->get();
        $this->institution = Institution::select('id', 'title')->where('status', 1)->get();
        $this->level = Level::select('id', 'title')->where('status', 1)->get();
        $this->modality = Modality::select('id', 'title')->where('status', 1)->get();
        $this->occupationArea = OccupationArea::select('id', 'title')->where('status', 1)->get();
        $this->office = Office::select('id', 'title')->where('status', 1)->get();
        $this->discipline = Discipline::select('id', 'title')->where('status', 1)->get();
    }

    public function search()
    {
        $query = Questions::query();

        if ($this->selectedFilters) {

            foreach ($this->selectedFilters as $key) {
                if ($key['table'] == 'year') {
                    $this->year[] = $key['id'];
                }
                if ($key['table']  == 'dificult_init') {
                    $this->dificult_init[] = $key['id'];
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
                'alternatives'
        ])
        ->get();
        dd($this->questions);
        //$this->emit('updateSelectedFilters', $this->selectedFilters);

    }

    public function updateSelectedFilters($id, $title, $table)
    {
        $idMask = $table.'_'.$title.'_'.$id;
        $insert=true;
        $i=0;
        foreach ($this->selectedFiltersMask as $key) {
            if(in_array($idMask,$key)){
                unset($this->selectedFiltersMask[$i]);
                unset($this->selectedFilters[$i]);
                $insert=false;
            }
            $i++;
        }

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

                // dd($this->selectedFiltersMask);
        }
        if($table=='disciplines'){
            $this->filterdiscipline = Discipline::select('id', 'title')->where('status', 1)->get();
            $this->filtermatters = $this->filterdiscipline->find($id)->matter;
        }
        if($table=='matters'){
            $this->filtermatters = Matter::select('id', 'title')->where('status', 1)->get();
            $this->filtersubMatters = $this->filtermatters->find($id)->subMatter;
        }

        $this->emit('updateSelectedFilters', $this->selectedFiltersMask);

    }

    public function render()
    {
        $this->questions = Questions::where('status', 1)
            ->with([
                'disciplines',
                'intitution',
                'examining_boards',
                'disciplines',
                'matters',
                'offices',
                'alternatives',
                'levels',
                'modalities',
                'occupation_areas'
            ])
            ->get();

        return view('livewire.app.questions.side-bar-filters')
            ->layout('layouts.' . $this->layout);
    }
}

