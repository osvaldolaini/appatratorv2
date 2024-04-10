<?php

namespace App\Livewire\Admin\Course\Contents;

use App\Models\Admin\Course\Module;
use App\Models\Admin\Course\ModuleContent;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class ModulesContentList extends Component
{
    public $showJetModal = false;
    public $showModalView = false;
    public $showModalOrder = false;
    public $alertSession = false;
    public $showModalNewContent = false;

    public $rules;
    public $detail;
    public $logs;
    public $model_id;
    public $registerId;
    public $qtdOrder;
    public $type_content;

    public $content;
    public $contents;
    public $module;

    //Campos
    public $active = 1;
    public $order;

    protected $listeners =
    [
        'uploadingImage',
    ];
    public function mount(ModuleContent $content)
    {
        $this->content = $content;
        $this->module = $content->module;
        $this->contents = ModuleContent::where('module_id',$this->content->module_id)->where('active', 1)->orderBy('order','asc')->get();
    }

    public function render()
    {
        return view('livewire.admin.courses.contents.modules-content-list');
    }
    public function resetAll()
    {
        $this->reset(
            'title',
        );
    }
    //ORDER
    public function modalOrder()
    {
        // dd($module->order);
        $this->order = '';
        $this->showModalOrder = true;
        $this->contents = $this->module->contents->where('active', 1)->sortBy('order');
        $this->order = $this->content->order;
        $this->model_id = $this->content->id;
    }
    public function rOrder()
    {
        // Obtenha todos os cards ordenados pela posição atual
        $contents = $this->module->contents->where('active', 1)->sortBy('order');

        // Encontre a posição atual do card selecionado
        $currentPosition = $contents->firstWhere('id', $this->model_id)->order;

        // Calcule a nova ordem dos cards
        $arrayOrder = [];
        $newPosition = $this->order; // Nova posição selecionada pelo usuário

        foreach ($contents as $module) {
            if ($module->id == $this->model_id) {
                // Insira o card movido para a nova posição
                $arrayOrder[] = $this->model_id;
            } else {
                if ($currentPosition < $newPosition && $module->order > $currentPosition && $module->order <= $newPosition) {
                    // Diminua a ordem dos cards que estão entre a posição atual e a nova posição
                    $module->order--;
                    $module->save();
                } elseif ($currentPosition > $newPosition && $module->order >= $newPosition && $module->order < $currentPosition) {
                    // Aumente a ordem dos cards que estão entre a nova posição e a posição atual
                    $module->order++;
                    $module->save();
                }

                // Insira o restante dos cards, mantendo a ordem relativa
                $arrayOrder[] = $module->id;
            }
        }

        // Atualize a ordem do card selecionado
        $card = ModuleContent::find($this->model_id);
        $card->order = $newPosition;
        $card->save();

        return redirect()->to('/cursos/modulo/' . $card->module->course_id)
            ->with('success', 'Modulos reordenados com sucesso.');
    }

    //READ
    public function showModalRead($id)
    {
        $this->showModalView = true;
        if (isset($id)) {
            $data = Module::where('id', $id)->first();
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
    public function showModalUpdate(Module $module)
    {
        redirect()->route('edit-module', $module);
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
        $data = Module::where('id', $id)->first();
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
        $data = Module::where('id', $id)->first();
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
}
