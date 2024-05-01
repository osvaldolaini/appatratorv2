<?php

namespace App\Livewire\Admin\Voucher;

use App\Models\Admin\Voucher\PackPivotApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;

class AppPacks extends Component
{
    use WithPagination;
    public PackPivotApp $packPivotApp;

    public $showJetModal = false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalDescription = false;
    public $showModalEdit = false;
    public $alertSession = false;
    public $rules;
    public $detail;
    public $logs;
    public $model_id;
    public $registerId;
    public $breadcrumb_title;

    //Dados da tabela
    public $model = "App\Models\Admin\Voucher\PackPivotApp"; //Model principal
    public $modelId = "id"; //Ex: 'table.id' or 'id'
    public $search;
    public $relationTables; //Relacionamentos ( table , key , foreingKey )
    public $customSearch; //Colunas personalizadas, customizar no model
    public $columnsInclude = 'title,value,active,qtd_parcel,value_parcel';
    public $searchable = 'title,value'; //Colunas pesquisadas no banco de dados
    public $sort = "order,asc"; //Ordenação da tabela se for mais de uma dividir com "|"
    public $paginate = 10; //Qtd de registros por página

    //Campos
    public $active = 1;
    public $id;
    public $title;
    public $description;
    public $see_value;
    public $price_id;
    public $value;
    public $qtd_parcel;
    public $link_hotmart;
    public $value_parcel;
    public $application;

    public function mount($app)
    {
        $this->application  = $app;
        switch ($this->application) {
            case 'questions':
                $this->breadcrumb_title = 'Questões';
                break;
            case 'treinament':
                $this->breadcrumb_title = 'Treinamento';
                break;
            case 'essay':
                $this->breadcrumb_title = 'Redação';
                break;
            case 'mentoring':
                $this->breadcrumb_title = 'Mentoria';
                break;
            }

    }
    public function render()
    {
        return view('livewire.admin.voucher.app-packs',
            [
                'dataTable' => $this->getData(),
            ]
        );
    }
    public function resetAll()
    {
        $this->reset(
            'title',
            'description',
            'see_value',
            'price_id',
            'value',
            'qtd_parcel',
            'link_hotmart',
            'value_parcel',
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
            'title' => 'required',
            'value' => 'required',
        ];
        $this->validate();

        PackPivotApp::create([
            'title'         => $this->title,
            'active'        => 1,
            'see_value'     => $this->see_value,
            'price_id'      => $this->price_id,
            'value'         => $this->value,
            'qtd_parcel'    => $this->qtd_parcel,
            'link_hotmart'  => $this->link_hotmart,
            'value_parcel'  => $this->value_parcel,
            'application'   => $this->application,
            'created_by'    => Auth::user()->name,
        ]);

        $this->openAlert('success', 'Registro criado com sucesso.');

        $this->showModalCreate = false;
        $this->resetAll();
    }
    //READ
    public function showModalRead($id)
    {
        $this->showModalView = true;
        if (isset($id)) {
            $data = PackPivotApp::where('id', $id)->first();
            $this->detail = [
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
    public function showModalUpdate(PackPivotApp $packPivotApp)
    {
        $this->resetAll();
        $this->model_id         = $packPivotApp->id;
        $this->title            = $packPivotApp->title;
        $this->description      = $packPivotApp->description;
        $this->see_value        = $packPivotApp->see_value;
        $this->price_id         = $packPivotApp->price_id;
        $this->value            = $packPivotApp->value;
        $this->qtd_parcel       = $packPivotApp->qtd_parcel;
        $this->link_hotmart     = $packPivotApp->link_hotmart;
        $this->value_parcel     = $packPivotApp->value_parcel;
        $this->showModalEdit    = true;
    }
    public function update()
    {
        $this->rules = [
            'title' => 'required',
            'order' => 'required',
            'value' => 'required',
        ];

        $this->validate();

        PackPivotApp::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'title'         => $this->title,
            'see_value'     => $this->see_value,
            'price_id'      => $this->price_id,
            'value'         => $this->value,
            'qtd_parcel'    => $this->qtd_parcel,
            'link_hotmart'  => $this->link_hotmart,
            'value_parcel'  => $this->value_parcel,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');

        $this->showModalEdit = false;
        $this->resetAll();
    }
    // //UPDATEDESCRIPTION
    // public function modalDescription(PackPivotApp $packPivotApp)
    // {
    //     $this->resetAll();
    //     $this->model_id = $packPivotApp->id;
    //     $this->description = $packPivotApp->description;
    //     $this->showModalDescription    = true;
    // }
    // public function descriptionUpdate()
    // {
    //     PackPivotApp::updateOrCreate([
    //         'id' => $this->model_id,
    //     ], [
    //         'description'   => $this->description,
    //         'updated_by' => Auth::user()->name,
    //     ]);

    //     $this->openAlert('success', 'Registro atualizado com sucesso.');

    //     $this->showModalDescription = false;
    //     $this->resetAll();
    // }
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
        $data = PackPivotApp::where('id', $id)->first();
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
        $data = PackPivotApp::where('id', $id)->first();
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
            $query = $query->where('active', '<=', 1);
            $query = $query->where('application', $this->application);
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

    public function back()
    {
        return redirect()->to('/aplicativos');
    }
}
