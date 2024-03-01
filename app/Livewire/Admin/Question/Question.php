<?php

namespace App\Livewire\Admin\Question;

use Livewire\Component;

use App\Models\Admin\Questions\Questions;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class Question extends Component
{
    use WithPagination;
    public Questions $questions;

    public $breadcrumb = 'Questões';

    public $showJetModal = false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;
    public $rules;
    public $detail;
    public $logs;
    public $model_id;
    public $registerId;

    //Dados da tabela
    public $model = "App\Models\Admin\Questions\Questions"; //Model principal
    public $modelId="questions.id"; //Ex: 'table.id' or 'id'
    public $search;
    public $relationTables = 'institutions,institutions.id,questions.institution_id | examining_boards,examining_boards.id,questions.examining_board_id | occupation_area_indices,occupation_area_indices.id,questions.occupation_area_indice_id | education_area_indices,education_area_indices.id,questions.education_area_indice_id | offices,offices.id,questions.office_id | levels,levels.id,questions.level_id | modalities,modalities.id,questions.modality_id | disciplines,disciplines.id,questions.discipline_id | matters,matters.id,questions.matter_id | sub_matters,sub_matters.id,questions.sub_matter_id'; //Relacionamentos ( table , key , foreingKey )
    public $customSearch; //Colunas personalizadas, customizar no model
    public $columnsInclude = 'year,questions.active,questions.created_at,institution_id,examining_board_id,occupation_area_indice_id,education_area_indice_id,office_id,level_id,modality_id,questions.discipline_id,questions.matter_id,questions.sub_matter_id';
    public $searchable = 'year,dificult_init,institutions.title,institutions.nick,examining_boards.title,examining_boards.nick,occupation_area_indices.title,occupation_area_indices.nick,education_area_indices.title,education_area_indices.nick,offices.title,offices.nick,levels.title,levels.nick,modalities.title,modalities.nick,disciplines.title,disciplines.nick,matters.title,matters.nick,sub_matters.title,sub_matters.nick'; //Colunas pesquisadas no banco de dados
    public $sort = "questions.created_at,desc"; //Ordenação da tabela se for mais de uma dividir com "|"
    public $paginate = 10; //Qtd de registros por página

    public function render()
    {
        return view('livewire.admin.questions.questions', [
            'dataTable' => $this->getData(),
        ]);
    }
    public function resetAll()
    {
        $this->reset(
            'title',
            'nick',
        );
    }
    //CREATE
    public function modalCreate()
    {
        redirect()->route('new-question');
    }
    //update
    public function showModalUpdate(Questions $questions)
    {
        redirect()->route('edit-question',$questions);
    }
    //alternative
    public function alternative(Questions $questions)
    {
        redirect()->route('alternative-question',$questions);
    }
    //correct
    public function correct(Questions $questions)
    {
        redirect()->route('correct-question',$questions);
    }
    //configs
    public function config(Questions $questions)
    {
        redirect()->route('config-question',$questions);
    }

    //READ
    public function showModalRead($id)
    {
        $this->showModalView = true;
        if (isset($id)) {
            $data = Questions::where('id', $id)->first();
            $this->detail = [
                'Criada'            => $data->created,
                'Criada por'        => $data->created_by,
                'Atualizada'        => $data->updated,
                'Atualizada por'    => $data->updated_by,
            ];
            $this->logs = logging($data->id,$this->model);
        } else {
            $this->detail = '';
        }
    }

    //DELETE
    public function showModalDelete($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->registerId = $id;
        } else {
            $this->registerId = '';
        }
    }
    //ACTIVE
    public function buttonActive($id)
    {
        $data = Questions::where('id', $id)->first();
        if ($data->active == 1) {
            $data->active = 0;
            $data->save();
        } else {
            $data->active = 1;
            $data->save();
        }
        $this->openAlert('success', 'Registro atualizado com sucesso.');
    }
    public function delete($id)
    {
        $data = Questions::where('id', $id)->first();
        $data->active = 2;
        $data->save();

        $this->openAlert('success', 'Registro excluido com sucesso.');

        $this->showJetModal = false;
        $this->resetAll();
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
    //SEARCH PERSONALIZADO
    private function getData()
    {
        if (Auth::user()->group == 'super-admin') {
            $query = $this->model::query();
        } else {
            $query = $this->model::query();
            $query = $query->where('questions.active', '<=', 1);
        }
        $selects = array($this->modelId .' as id');
        if ($this->columnsInclude) {
            foreach (explode(',', $this->columnsInclude) as $key => $value) {
                array_push($selects, $value);
            }
        } else {
            $selects = '*';
        }
        // dd($selects);
        $query->select($selects);

        if ($this->relationTables != "") {
            $query = $this->relationTables($query);
        }
        if ($this->sort != "") {
            $query = $this->sort($query);
        }
        if ($this->searchable && $this->search) {
            $this->search($query);
        }

        // dd($query);
        return $query->paginate($this->paginate);
    }
    #PRICIPAL FUNCTIONS
        public function search($query)
        {
            $searchTerms = explode(',', $this->searchable);
            $query->where(function ($innerQuery) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    if ($this->customSearch) {
                        $fields = explode('|', $this->customSearch);
                        if (in_array($term, $fields)) {
                            $search = array($term => $this->search);
                            $formattedSearch = $this->model::filterFields($search);
                            if ($formattedSearch['converted'] != '%0%') {
                                $innerQuery->orWhere($term, $formattedSearch['f'], $formattedSearch['converted']);
                            } else {
                                $innerQuery->orWhere($term, 'LIKE', '%' . $this->search . '%');
                            }
                        } else {
                            $innerQuery->orWhere($term, 'LIKE', '%' . $this->search . '%');
                        }
                    } else {
                        $innerQuery->orWhere($term, 'LIKE', '%' . $this->search . '%');
                    }
                }
            });
            // dd($query);
        }
    #END PRICIPAL FUNCTIONS
    #EXTRA FUNCTIONS
        //SORT
        public function sort($query)
        {
            $this->sort = str_replace(' ', '', $this->sort);
            $sortData = explode('|', $this->sort);
            $c = count($sortData);
            for ($i = 0; $i < $c; $i++) {
                $s = explode(',', $sortData[$i]);
                if (count($s) === 2) {
                    $query->orderBy($s[0], $s[1]);
                }
            }
            return $query;
        }
        //RELATIONSHIPS
        public function relationTables($query)
        {
            $this->relationTables = str_replace(' ', '', $this->relationTables);
            $relationTables = explode('|', $this->relationTables);
            $crt = count($relationTables);
            for ($i = 0; $i < $crt; $i++) {
                $rt = explode(',', $relationTables[$i]);
                if (count($rt) === 3) {
                    $query->leftJoin($rt[0], $rt[1], '=', $rt[2]);
                }
            }
            return $query;
        }
}
