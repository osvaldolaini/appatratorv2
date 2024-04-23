<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\PackPivotCourse;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class CoursesPacks extends Component
{
    use WithPagination;
    public PackPivotCourse $packPivotCourse;

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
    public $model = "App\Models\Admin\Course\PackPivotCourse"; //Model principal
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
    public $order;
    public $highlighted;
    public $description;
    public $see_value;
    public $price_id;
    public $value;
    public $qtd_parcel;
    public $link_hotmart;
    public $value_parcel;
    public $courses_id;

    public function mount(Course $course)
    {
        $this->courses_id       = $course->id;
        $this->breadcrumb_title = $course->title;
    }
    public function render()
    {
        return view('livewire.admin.courses.courses-packs',
            [
                'dataTable' => $this->getData(),
            ]
        );
    }
    public function resetAll()
    {
        $this->reset(
            'title',
            'order',
            'highlighted',
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
            'order' => 'required',
            'value' => 'required',
        ];
        $this->validate();

        PackPivotCourse::create([
            'title'         => $this->title,
            'active'        => 1,
            'order'         => $this->order,
            'highlighted'   => $this->highlighted,
            'see_value'     => $this->see_value,
            'price_id'      => $this->price_id,
            'value'         => $this->value,
            'qtd_parcel'    => $this->qtd_parcel,
            'link_hotmart'  => $this->link_hotmart,
            'value_parcel'  => $this->value_parcel,
            'courses_id'    => $this->courses_id,
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
            $data = PackPivotCourse::where('id', $id)->first();
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
    public function showModalUpdate(PackPivotCourse $packPivotCourse)
    {
        $this->resetAll();
        $this->model_id         = $packPivotCourse->id;
        $this->title            = $packPivotCourse->title;
        $this->order            = $packPivotCourse->order;
        $this->highlighted      = $packPivotCourse->highlighted;
        $this->description      = $packPivotCourse->description;
        $this->see_value        = $packPivotCourse->see_value;
        $this->price_id         = $packPivotCourse->price_id;
        $this->value            = $packPivotCourse->value;
        $this->qtd_parcel       = $packPivotCourse->qtd_parcel;
        $this->link_hotmart     = $packPivotCourse->link_hotmart;
        $this->value_parcel     = $packPivotCourse->value_parcel;
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

        PackPivotCourse::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'title'         => $this->title,
            'order'         => $this->order,
            'highlighted'   => $this->highlighted,
            'see_value'     => $this->see_value,
            'price_id'      => $this->price_id,
            'value'         => $this->value,
            'qtd_parcel'    => $this->qtd_parcel,
            'link_hotmart'  => $this->link_hotmart,
            'value_parcel'  => $this->value_parcel,
            'courses_id'    => $this->courses_id,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');

        $this->showModalEdit = false;
        $this->resetAll();
    }
    //UPDATEDESCRIPTION
    public function modalDescription(PackPivotCourse $packPivotCourse)
    {
        $this->resetAll();
        $this->model_id = $packPivotCourse->id;
        $this->description = $packPivotCourse->description;
        $this->showModalDescription    = true;
    }
    public function descriptionUpdate()
    {
        PackPivotCourse::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'description'   => $this->description,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');

        $this->showModalDescription = false;
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
        $data = PackPivotCourse::where('id', $id)->first();
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
        $data = PackPivotCourse::where('id', $id)->first();
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
            $query = $query->where('courses_id', $this->courses_id);
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
