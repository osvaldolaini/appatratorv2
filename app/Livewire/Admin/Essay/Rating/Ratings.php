<?php

namespace App\Livewire\Admin\Essay\Rating;

use App\Models\Admin\Essay\PivotSkillsEssays;
use App\Models\Admin\Essay\Rating;
use App\Models\Apps\Essay\EssayUser;
use Livewire\Component;

class Ratings extends Component
{

    public $rate;
    public $model_id;
    public $ratings;
    public $essayUser;
    public $pivotSkills;

    public $breadcrumb = 'Redação nº ';

    public function mount(EssayUser $essayUser)
    {
        $this->essayUser=$essayUser;
        $this->model_id=$essayUser->id;
        $this->rate =  $essayUser->essay->essay->where("active",1);
        $this->ratings = Rating::where('essay_user_id',$essayUser->id)->get();
        $this->pivotSkills = $this->ratings->map(
            fn($qry)=>[
                'id' =>$qry->pivot_skills_essay_id
            ]
        )->pluck('id')->toArray();
        $this->breadcrumb .= $essayUser->id;

    }

    public function render()
    {
        return view('livewire.admin.essay.ratings');
    }

}
