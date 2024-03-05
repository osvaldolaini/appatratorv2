<?php

namespace App\Http\Livewire\App\Treinaments;

use App\Models\Admin\Treinament\Exercise;
use App\Models\Admin\Treinament\Season;
use Livewire\Component;

use App\Models\Admin\Treinament\SeasonExercise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SeasonExercises extends Component
{
        // public Season $season;
        public $seasonExercises;
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
        public $heads;
        public $status = 1;
        public $time;
        public $repeat;
        public $distance;
        public $code;
        public $rules;
        public $model_id;
        public $exercise_id;
        public $season_id;
        public $exercises;
        public $unity = null;

        // Define o layout a ser usado
        protected $layout = 'treinaments';

        public function getUnity()
        {
            $this->unity = Exercise::where('id',$this->exercise_id)->first()->unity;
        }

        public function mount(Season $season)
        {
            $this->season_id = $season->id;
            $this->seasonExercises = SeasonExercise::where('status',1)
            ->where('season_id',$season->id)
            ->where('user_id',Auth::user()->id)
            ->get();
            $this->exercises = Exercise::where('status',1)
                                        ->where('user_id',Auth::user()->id)
                                        ->orWhere('user_id',null)
                                        ->get();
        }
        public function render()
        {
            $this->seasonExercises = SeasonExercise::where('status',1)
            ->where('season_id',$this->season_id)
            ->where('user_id',Auth::user()->id)
            ->get();
            // Gate::authorize('user');
            return view('livewire.app.treinaments.season-exercises')->layout('layouts.' . $this->layout);
        }

        //CREATE
        public function showModalCreate()
        {
            $this->showModalCreate = true;
        }
        public function store()
        {
            $this->rules = [
                    'exercise_id'=>'required',
            ];
            $this->validate();
            SeasonExercise::create([
                'time'          =>$this->time,
                'repeat'        =>$this->repeat,
                'distance'      =>$this->distance,
                'exercise_id'   =>$this->exercise_id,
                'season_id'     =>$this->season_id,
                'user_id'       =>Auth::user()->id,
                'status'        =>1,
                'code'          =>Str::uuid(),
            ]);
            session()->flash('success','Registro criado com sucesso');

                $this->alertSession = true;
                $this->showModalCreate = false;
                $this->reset('time','repeat','distance','exercise_id');
        }
        //READ
        public function showView($id)
        {
            $this->showModalView= true;

            if (isset($id)) {
                $data = SeasonExercise::where('id',$id)->first();
                // dd($data);
                $this->detail = [
                    'Concurso'          => $data->title,
                    'Ano'               => $data->year,
                    'Data do teste'     => convertOnlyDate($data->limit_date),
                    'Status'            => ($data->status == 1 ? 'Ativo':'Inativo'),
                    'Criada'            => convertDate($data->created_at),
                    'Criada por'        => $data->created_by,
                    'Atualizada'        => convertDate($data->updated_at),
                    'Atualizada por'    => $data->updated_by,
                ];
            }else{
                $this->detail = '';
            }
        }
        //UPDATE
        public function showModalEdit(SeasonExercise $seasonExercises)
        {
            $this->unity        = Exercise::where('id',$seasonExercises->exercise_id)->first()->unity;
            $this->model_id     = $seasonExercises->id;
            $this->time         = $seasonExercises->time;
            $this->repeat       = $seasonExercises->repeat;
            $this->distance     = $seasonExercises->distance;
            $this->showModalEdit= true;
        }
        public function update()
        {
           SeasonExercise::updateOrCreate([
                'id'=>$this->model_id,
            ],[
                'time'          =>$this->time,
                'repeat'        =>$this->repeat,
                'distance'      =>$this->distance,
            ]);

            session()->flash('success','Registro atualizado com sucesso');

                $this->alertSession = true;
                $this->showModalEdit = false;
                $this->reset('time','repeat','distance');
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
            $data = SeasonExercise::where('id',$id)->first();
            $data->status = '0';
            $data->save();

            session()->flash('success','Registro excluido com sucesso.');

                $this->alertSession = true;
                $this->showJetModal = false;
                $this->reset('time','repeat','distance');
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
            return SeasonExercise::where('id',$id)->first()->status;
        }


    }
