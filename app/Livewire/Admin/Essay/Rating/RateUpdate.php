<?php

namespace App\Livewire\Admin\Essay\Rating;
use App\Models\Admin\Essay\Rating;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class RateUpdate extends Component
{
    public $rating;
    public $points;
    public $model_id;
    public $alertSession = false;

    public function mount(Rating $rating)
    {
        $this->points = $rating->points;
        $this->rating = $rating;
        $this->model_id = $rating->id;
    }
    public function render()
    {
        return view('livewire.admin.essay.rate-update');
    }
    public function updatePoints()
    {
        $this->validate(
            ['points' => 'required|max:'.$this->rating->pivotEssay->points],
        );
        Rating::updateOrCreate([
            'id'=>$this->model_id,
        ],[
            'points'       => $this->points,
            'user_id'      => Auth::user()->id,
        ]);
        $this->openAlert('success', 'Tópico avaliado com sucesso.');
    }
     //MESSAGE
     public function openAlert($status, $msg)
     {
         $this->dispatch('openAlert', $status, $msg);
     }
}
