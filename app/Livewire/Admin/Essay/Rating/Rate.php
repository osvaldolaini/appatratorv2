<?php

namespace App\Livewire\Admin\Essay\Rating;

use App\Models\Admin\Essay\PivotSkillsEssays;
use App\Models\Admin\Essay\Rating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Rate extends Component
{
    public $rate;
    public $points;
    public $model_id;
    public $essay_user_id;
    public $alertSession = false;

    public function mount(PivotSkillsEssays $rate,$essay_user_id)
    {
        $this->model_id =  $rate->id;
        $this->points = $rate->points;
        $this->rate = $rate;
        $this->essay_user_id = $essay_user_id;
    }
    public function render()
    {
        return view('livewire.admin.essay.rate');
    }
    public function updatePoints()
    {
        $this->validate(
            ['points' => 'required|max:'.$this->rate->points],
        );
        Rating::create([
            'pivot_skills_essay_id' => $this->model_id,
            'essay_user_id'         => $this->essay_user_id,
            'points'                => $this->points,
            'user_id'               => Auth::user()->id,
        ]);
        $this->openAlert('success', 'Tópico avaliado com sucesso.');
    }
     //MESSAGE
     public function openAlert($status, $msg)
     {
         $this->dispatch('openAlert', $status, $msg);
     }

}
