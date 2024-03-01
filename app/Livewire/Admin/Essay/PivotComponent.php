<?php

namespace App\Livewire\Admin\Essay;

use App\Models\Admin\Essay\PivotSkillsEssays;
use Livewire\Component;

class PivotComponent extends Component
{

    public $pivotSkillsEssays;
    public $points;
    public $pivot_id;

    public function mount(PivotSkillsEssays $pivotSkillsEssays)
    {
        $this->pivot_id =  $pivotSkillsEssays->id;
        $this->points = $pivotSkillsEssays->points;
    }
    public function render()
    {
        return view('livewire.admin.essay.pivot-component');
    }
    public function updatePoints()
    {
        PivotSkillsEssays::updateOrCreate([
            'id'    => $this->pivot_id,
        ],[
            'points'=>$this->points,
        ]);

        $this->dispatch('closeModal');
    }
}
