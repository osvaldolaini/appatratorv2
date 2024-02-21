<?php

namespace App\Livewire\Admin\Marketing;

use App\Models\Admin\Marketing\SocialMedias;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SocialMedia extends Component
{
    use WithPagination;

    public SocialMedias $socialMedias;
    public $showJetModal = false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;
    public $rules;
    public $detail;

    public $model_id;
    public $registerId;
    public $active = 1;
    public $title;
    public $media;
    public $link;

    protected $listeners =
    [
        'showModalCreate',
        'showModalRead',
        'showModalUpdate',
        'showModalDelete'
    ];

    public function render()
    {
        if (Gate::allows('profile-user')) {
            abort(403);
        }
        return view('livewire.admin.marketing.social-media');
    }
    public function resetAll()
    {
        $this->reset(
            'title',
            'media',
            'link',
        );
    }

    //CREATE
    public function showModalCreate()
    {
        $this->resetAll();
        $this->showModalCreate = true;
    }
    public function store()
    {
        $this->rules = [
            'title' => 'required',
            'media' => 'required',
            'link'  => 'required',
        ];
        $this->validate();

        SocialMedias::create([
            'title'     => $this->title,
            'media'     => $this->media,
            'link'      => $this->link,
            'active'    => 1,
            'created_by'=> Auth::user()->name,
        ]);

        $this->openAlert('success','Registro criado com sucesso.');

        $this->showModalCreate = false;
        $this->resetAll();
    }
    //READ
    public function showModalRead($id)
    {
        $this->showModalView = true;

        if (isset($id)) {
            $data = SocialMedias::where('id', $id)->first();

            $this->detail = [
                'Criada'            => $data->created,
                'Criada por'        => $data->created_by,
                'Atualizada'        => $data->updated,
                'Atualizada por'    => $data->updated_by,
            ];
        } else {
            $this->detail = '';
        }
    }
    //UPDATE
    public function showModalUpdate(SocialMedias $socialMedias)
    {
        $this->resetAll();

        $this->model_id     = $socialMedias->id;
        $this->title        = $socialMedias->title;
        $this->media        = $socialMedias->convertMedia;
        $this->link         = $socialMedias->link;
        $this->showModalEdit= true;
    }
    public function update()
    {
        $this->rules = [
            'title' => 'required',
            'media' => 'required',
            'link'  => 'required',
        ];

        $this->validate();


        SocialMedias::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'title'     => $this->title,
            'media'     => $this->media,
            'link'      => $this->link,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success','Registro atualizado com sucesso.');

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
    public function delete($id)
    {
        $data = SocialMedias::where('id', $id)->first();
        $data->delete();

        $this->openAlert('success','Registro excluido com sucesso.');

        $this->showJetModal = false;
        $this->resetAll();
    }
    //pega o status do registro
    public function openAlert($status,$msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
