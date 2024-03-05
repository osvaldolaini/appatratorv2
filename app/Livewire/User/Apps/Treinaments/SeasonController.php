<?php

namespace App\Http\Livewire\App\Treinaments;

use App\Models\Admin\Treinament\Season;
use App\Models\Admin\Treinament\SeasonExercise;
use App\Models\Admin\Treinament\Training;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class SeasonController extends Component
{
    use WithPagination;

    // public Season $season;
    public $season;
    public $search;
    public $sortField = 'limit_date';
    public $sortDirection = 'desc';
    public $showJetModal= false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $registerId;
    public $alertSession = false;
    public $selectFilter = 'id';

    public $getStat;
    public bool $toggleStatus;

    public $detail;
    public $exercises;
    public $heads;
    public $status = 1;
    public $title;
    public $year;
    public $limit_date;
    public $code;
    public $rules;
    public $model_id;
    public $vouchers;
    public $access;

    // Define o layout a ser usado
    protected $layout = 'treinaments';

    public function mount()
    {
        $this->season = Season::where('user_id',Auth::user()->id)
        ->where('status',1)
        ->orderBy('limit_date','desc')
        ->get();

        $this->vouchers = Auth::user()->vouchers
                        ->where('status',1)
                        ->where('limit_access','>=', date('Y-m-d h:i:s'));
        foreach ($this->vouchers as $voucher) {
            if ($voucher->application == 'treinament'){
                $this->access = true;
            }
        }
    }
    public function render()
    {
        $this->season = Season::where('user_id',Auth::user()->id)
        ->where('status',1)
        ->orderBy('limit_date','desc')
        ->get();
        // Gate::authorize('user');
        return view('livewire.app.treinaments.season')->layout('layouts.' . $this->layout);
    }

    //CREATE
    public function showModalCreate()
    {
        $this->showModalCreate = true;
    }
    public function store()
    {
        $this->rules = [
                'title'=>'required|min:2|max:255',
        ];
        $this->validate();
        $this->limit_date = implode("-",array_reverse(explode("/",$this->limit_date)));
        Season::create([
            'title'     =>$this->title,
            'year'      =>$this->year,
            'limit_date'     =>$this->limit_date,
            'user_id'   =>Auth::user()->id,
            'status'    =>1,
            'code'      =>Str::uuid(),
            'created_by'=>Auth::user()->name,
        ]);
        session()->flash('success','Registro criado com sucesso');

            $this->alertSession = true;
            $this->showModalCreate = false;
            $this->reset('title','limit_date','year');
    }
    //READ
    public function showView($id)
    {
        $this->showModalView= true;

        if (isset($id)) {
            $data = Season::where('id',$id)->first();
            // dd($data);
            $this->detail = [
                'Concurso'          => $data->title,
                'Ano'               => $data->year,
                'Data do teste'     => convertOnlyDate($data->limit_date),
            ];
            $seasonExercises = SeasonExercise::where('status',1)
            ->where('season_id',$data->id)
            ->where('user_id',Auth::user()->id)
            ->get();
            if($seasonExercises){
                foreach ($seasonExercises as $key) {
                    if ($key->exercise->unity == 'repeticao'){
                        $this->exercises[$key->exercise->title] =
                        Training::where('exercise_id',$key->exercise_id)->orderBy('repeat','desc')->first()->repeat;
                    }elseif ($key->exercise->unity == 'cm' or $key->exercise->unity == 'm' or $key->exercise->unity == 'km'){
                        $this->exercises[$key->exercise->title] =
                        Training::where('exercise_id',$key->exercise_id)->orderBy('distance','desc')->first()->distance;
                    }elseif ($key->exercise->unity == 'min'){
                        $this->exercises[$key->exercise->title] =
                        Training::where('exercise_id',$key->exercise_id)->orderBy('time','desc')->first()->time;
                    }
                }
            }

        }else{
            $this->exercises = '';
            $this->detail = '';
        }
    }
    //UPDATE
    public function showModalEdit(Season $season)
    {
        $this->model_id = $season->id;
        $this->title    = $season->title;
        $this->year     = $season->year;
        $this->limit_date    = convertOnlyDate($season->limit_date);
        $this->status   = $season->status;
        $this->showModalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'title'=>'required|min:2|max:255',
        ];
        $this->validate();
        $this->limit_date = implode("-",array_reverse(explode("/",$this->limit_date)));
        Season::updateOrCreate([
            'id'=>$this->model_id,
        ],[
            'title'     =>$this->title,
            'year'      =>$this->year,
            'limit_date'     =>$this->limit_date,
            // 'user_id'   =>Auth::user()->id,
            'status'    =>$this->status,
            'updated_by'=>Auth::user()->name,
        ]);


        session()->flash('success','Registro atualizado com sucesso');

            $this->alertSession = true;
            $this->showModalEdit = false;
            $this->reset('title','limit_date','year');
    }
    //DELETE
    public function showModal($id)
    {
        $this->showJetModal= true;
        if (isset($id)) {
            $this->registerId = $id;
        }else{
            $this->registerId = '';
        }
    }
    public function delete($id)
    {
        $data = Season::where('id',$id)->first();
        $data->status = '0';
        $data->save();

        session()->flash('success','Registro excluido com sucesso.');

            $this->alertSession = true;
            $this->showJetModal = false;
            $this->reset('title');
    }



   //EXTRAS
    //Ordena os colunas nas tabelas
    public function sortBy($field)
    {
        if ($field == $this->sortField) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
    //pega o status do registro
    public function getStatus($id)
    {
        return Season::where('id',$id)->first()->status;
    }

}

