<?php

namespace App\Livewire\User\Apps\Essay;

use App\Models\Admin\Essay\Essay;
use App\Models\Admin\Essay\Rating;
use App\Models\Admin\Essay\Topic;
use App\Models\Apps\Essay\EssayUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HomeEssay extends Component
{
    public $myEssays;
    public $allEssays;
    public $labels = [];
    public $days = [];
    public $hits = [];
    public $seasonTreinaments;
    public $topic= [];
    public $stats= [];
    // Define o layout a ser usado
    protected $layout = 'essay';

    public function convert($date, $v)
    {
        if ($v == 1) {
            return date('d/m/Y',  strtotime($date));
        } else {
            return date('Y-m-d',  strtotime($date));
        }
    }
    // public function mount()
    // {
    //     $this->myEssays = EssayUser::where('status',3)
    //     ->where('user_id', Auth::user()->id)
    //     ->orderBy('performed_at', 'ASC')->get();

    //     // dd($exer);
    //     foreach ($this->myEssays as $myEssay) {
    //         $d=[];
    //         $qtd=[];
    //         $this->allEssays = Essay::where('id',$myEssay->essay_id)->get();
    //         $points = 0;
    //         foreach ($this->allEssays as $allEssay) {
    //             $exer[] = $allEssay->id;
    //         }
    //         $exer = array_unique( $exer);

    //         for ($i=0; $i < count($exer); $i++) {
    //             $e = Essay::where('id',$exer[$i])->first();

    //             $rtns = Rating::where('essay_user_id',$exer[$i])->get();
    //             foreach ($rtns as $key) {
    //                 $points += $key->points;
    //             }
    //             $d[]=$this->convert($myEssay->performed_at,1);
    //             // $d = $myEssay->map(
    //             //     fn($rtn)=>[
    //             //         'performed_at' => $this->convert(EssayUser::orderBy('performed_at','desc')->where('id',$rtn->essay_user_id)
    //             //         ->first()->performed_at,1),
    //             //     ]
    //             // )->pluck('performed_at')->toArray();

    //             $qtd[] = $points;

    //             $this->stats[$exer[$i]] = array(
    //                 'id'=>$e->id,
    //                 'title'=>$e->title,
    //                 'labels'=>$d,
    //                 'qtd'=>$qtd,
    //             );
    //         }
    //     }
    //     // dd($exer);
    //     dd($this->stats);
    // }
    public function mount()
    {
        $this->allEssays = Essay::all();

        foreach ($this->allEssays as $allEssay) {
            $qtd=[];
            $labels=[];
            $this->myEssays = EssayUser::where('status',3)
            ->where('essay_id',$allEssay->id)
            ->where('user_id', Auth::user()->id)
            ->orderBy('performed_at', 'ASC')->get();

            foreach ($this->myEssays as $myEssay) {
                $points = 0;
                $rtns = Rating::where('essay_user_id',$myEssay->id)->get();
                foreach ($rtns as $key) {
                    $points += $key->points;
                }
                $qtd[] = $points;
                $labels[]=$this->convert($myEssay->performed_at,1);
            }
            $this->stats[] = array(
                'id'=>$allEssay->id,
                'title'=>$allEssay->title,
                'labels'=>$labels,
                'qtd'=>$qtd,
            );

        }

        // dd($exer);
        // dd($this->stats);
    }
    public function render()
    {
        return view('livewire.user.apps.essay.home-essay')
        ->layout('layouts.' . $this->layout);
    }
}
