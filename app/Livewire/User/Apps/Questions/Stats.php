<?php

namespace App\Http\Livewire\App\Questions;

use App\Models\Admin\Responses;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Stats extends Component
{
    public $labels = [];
    public $days = [];
    public $hits= [];
    public $foults= [];
    public $day=[];
    public $total=[];
    protected $layout = 'questions-stats';

    public function convert($date,$v)
    {
        if($v ==1){
            return date( 'd/m/Y',  strtotime($date));
        }else{
            return date( 'Y-m-d',  strtotime($date));
        }
    }
    public function mount()
    {
        $d = date('Y-m-d H:i:s');
        $dt = date('Y-m-d H:i:s', strtotime('-30 days', strtotime($d)));
        $questions = Responses::query()->with('alternatives')
        ->where('created_at','>=',$dt)
        ->where('user_id',Auth::user()->id)
        ->select('created_at','alternative_id')
        ->orderBy('created_at')->get();
        // $this->labels = $questions->pluck('created_at')->toArray();
        $this->labels = $questions->map(
            fn($question)=>[
                'created_at' => $this->convert($question->created_at,1)
            ]
        )->pluck('created_at')->toArray();

        $this->days = $questions->map(
            fn($question)=>[
                'created_at' => $this->convert($question->created_at,0)
            ]
        )->pluck('created_at')->toArray();

        $this->days = array_unique($this->days);

        foreach ($this->days as $key) {
            $this->day[]=$this->convert($key,1);
            $i=0;$e=0;
            $variable=Responses::with('alternatives')->where('created_at','LIKE','%'.$key.'%')->get();
            foreach ($variable as $value) {
                if ($value->alternatives->correct == 1) {
                    $i++;
                }else{
                    $e++;
                }
            }
            $this->hits[] = $i;
            $this->foults[] = $e;
            $this->total[] = $e + $i;
        }

        $this->labels = $this->day;
    }

    public function render()
    {
        // dd($this->labels);
        return view('livewire.app.questions.stats')
        ->layout('layouts.' . $this->layout);
    }
}
