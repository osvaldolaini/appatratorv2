<?php

namespace App\Livewire\Admin\Question\Filter;

use App\Models\Admin\Questions\Filters\Discipline;
use App\Models\Admin\Questions\Filters\EducationArea;
use App\Models\Admin\Questions\Filters\ExaminingBoard;
use App\Models\Admin\Questions\Filters\Institution;
use App\Models\Admin\Questions\Filters\Level;
use App\Models\Admin\Questions\Filters\Matter;
use App\Models\Admin\Questions\Filters\Modality;
use App\Models\Admin\Questions\Filters\OccupationArea;
use App\Models\Admin\Questions\Filters\Office;
use App\Models\Admin\Questions\Filters\SubMatter;
use Livewire\Component;

class Filters extends Component
{
    public $discipline;
    public $educationArea;
    public $examiningBoard;
    public $institution;
    public $level;
    public $matter;
    public $modality;
    public $occupationArea;
    public $office;
    public $subMatter;
    public $breadcrumb = 'Filtros';

    public function mount()
    {
        $this->occupationArea   = OccupationArea::where('active',1)->get()->count();
        $this->educationArea    = EducationArea::where('active',1)->get()->count();
        $this->examiningBoard   = ExaminingBoard::where('active',1)->get()->count();
        $this->office           = Office::where('active',1)->get()->count();
        $this->discipline       = Discipline::where('active',1)->get()->count();
        $this->institution      = Institution::where('active',1)->get()->count();
        $this->level            = Level::where('active',1)->get()->count();
        $this->matter           = Matter::where('active',1)->get()->count();
        $this->modality         = Modality::where('active',1)->get()->count();
        $this->subMatter        = SubMatter::where('active',1)->get()->count();
    }
    public function render()
    {
        return view('livewire.admin.questions.filters.filters');
    }
}
