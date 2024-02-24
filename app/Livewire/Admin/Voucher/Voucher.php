<?php

namespace App\Livewire\Admin\Voucher;

use App\Models\Admin\Voucher\Plans;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Voucher extends Component
{
    use WithPagination;
    public Vouchers $vouchers;
    public $breadcrumb = 'Vouchers';

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
    public $model = "App\Models\Admin\Voucher\Vouchers"; //Model principal
    public $modelId = "vouchers.id"; //Ex: 'table.id' or 'id'
    public $search;
    public $relationTables = "users,users.id,vouchers.user_id"; //Relacionamentos ( table , key , foreingKey )
    public $customSearch = 'application|limit_access'; //Colunas personalizadas, customizar no model
    public $columnsInclude = 'user_id,application,limit_access,users.name,users.email,vouchers.active';
    public $searchable = 'application,users.name,users.email,limit_access'; //Colunas pesquisadas no banco de dados
    public $sort = "vouchers.id,desc"; //Ordenação da tabela se for mais de uma dividir com "|"
    public $paginate = 10; //Qtd de registros por página

    public $plans;

    //Search
    public $modalSearch = false;
    public $inputSearch;
    public $typeSearch;
    public $results;
    public $user;

    //Campos
    public $active = 0;
    public $user_id;
    public $plan_id;
    public $code;
    public $application;
    public $limit_access;
    public $applications = [];

    public function render()
    {
        $this->plans = Plans::where('active', 1)->get();
        if ($this->inputSearch != '') {
            $this->results = User::select('id', 'name','email')
                ->where('name', 'LIKE', '%' . $this->inputSearch . '%')
                ->limit(7)->get();
        }
        return view('livewire.admin.voucher.vouchers', [
            'dataTable' => $this->getData(),
        ]);

    }
    public function openModalSearch($typeSearch)
    {
        $this->modalSearch = true;
        $this->typeSearch = $typeSearch;
    }
    public function selectUser($id)
    {
        $user = User::find($id);

        if ($this->typeSearch == 'user') {
            $this->user_id = $user->id;
            $this->user = $user->name;
        }

        $this->typeSearch = '';
        $this->inputSearch = '';
        $this->results = '';

        $this->modalSearch = false;
    }
    public function resetAll()
    {
        $this->reset(
            'user_id',
            'plan_id',
            'active',
            'code',
            'application',
            'limit_access',
        );
    }
    //CREATE
    public function modalCreate()
    {
        $this->resetAll();
        $this->showModalCreate = true;
    }

    public function store()
    {
        $this->rules = [
            'plan_id'=>'required|min:1|max:10',
            // 'user_id'=>'required|min:1|max:10',
            'applications'=>'required',
        ];
        $this->validate();

        $code = Str::uuid();
        for ($i=0; $i < count($this->applications); $i++) {
            Vouchers::create([
                'plan_id'       =>$this->plan_id,
                'user_id'       =>$this->user_id,
                'application'   =>$this->applications[$i],
                'active'        => 0,
                'code'          =>$code,
                'created_by'    =>Auth::user()->name,
            ]);
        }

        $this->openAlert('success', 'Registro criado com sucesso.');

        $this->showModalCreate = false;
        $this->resetAll();
    }
    //READ
    public function showModalRead($id)
    {
        $this->showModalView = true;
        if (isset($id)) {
            $data = Vouchers::where('id', $id)->first();
            $this->detail = [
                'Cliente'           => ($data->user_id ? $data->user->name : 'Não registrado'),
                'Voucher'           => $data->code,
                'Criada'            => $data->created,
                'Criada por'        => $data->created_by,
                'Atualizada'        => $data->updated,
                'Atualizada por'    => $data->updated_by,
            ];
            $this->logs = logging($data->id, $this->model);
        } else {
            $this->detail = '';
        }
    }
    //UPDATE
    public function showModalUpdate(Vouchers $vouchers)
    {
        $this->resetAll();

        $this->model_id         = $vouchers->id;
        $this->plan_id          = $vouchers->plan_id;
        $this->user_id          = $vouchers->user_id;
        $this->showModalEdit = true;
    }
    public function update()
    {
        Vouchers::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'plan_id'                 => $this->plan_id,
            'user_id'                 => $this->user_id,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');

        $this->showModalEdit = false;
        $this->resetAll();
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
        $data = Vouchers::where('id', $id)->first();
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
        $data = Vouchers::where('id', $id)->first();
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
            $query = $query->where('vouchers.active', '!=', 2);
        }
        $selects = array($this->modelId . ' as id');
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
