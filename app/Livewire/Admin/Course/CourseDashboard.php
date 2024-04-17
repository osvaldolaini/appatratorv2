<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\Module;
use App\Models\Admin\Course\ModuleContent;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class CourseDashboard extends Component
{
    use WithPagination;
    public Module $module;
    public $breadcrumb;

    //API
    public $course;
    public $modules;

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->modules = $course->modules->where('active', 1)->sortBy('order');
        $this->breadcrumb .= $course->title;
    }

    public function render()
    {
        return view('livewire.admin.courses.dashboard');
    }
    public function resetAll()
    {
        $this->reset(
            'title',
        );
    }
    //NEW CONTENT
    public function newContent(Module $module)
    {
        $this->model_id = $module->id;
        $this->showModalNewContent = true;
    }
    //NEW CONTENT
    public function goContent($type_content)
    {
        $tot = ModuleContent::where('module_id',$this->model_id)->where('active',1)->orderBy('order','desc')->first();
        if($tot){
            $order = $tot->order + 1;
        }else{
            $order = 1;
        }
        $content = ModuleContent::create([
            'type_content'  => $type_content,
            'module_id'     => $this->model_id,
            'order'         => $order,
            'active'        => 1,
            'code'          => Str::uuid(),
            'created_by'    => Auth::user()->name,
        ]);

        return redirect()->to('/cursos/modulo/conteúdo/' . $content->id)
            ->with('success', 'Conteúdo criado com sucesso.');
    }

    //CREATE
    public function modalCreate()
    {
        redirect()->route('new-module', $this->course->id);
    }
    //ORDER
    public function modalOrder(Module $module)
    {
        // dd($module->order);
        $this->order = '';
        $this->showModalOrder = true;
        $this->modules = $this->course->modules->where('active', 1)->sortBy('order');
        $this->order = $module->order;
        $this->model_id = $module->id;
    }
    public function rOrder()
    {
        // Obtenha todos os cards ordenados pela posição atual
        $modules = $this->course->modules->where('active', 1)->sortBy('order');

        // Encontre a posição atual do card selecionado
        $currentPosition = $modules->firstWhere('id', $this->model_id)->order;

        // Calcule a nova ordem dos cards
        $arrayOrder = [];
        $newPosition = $this->order; // Nova posição selecionada pelo usuário

        foreach ($modules as $module) {
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
        $card = Module::find($this->model_id);
        $card->order = $newPosition;
        $card->save();

        return redirect()->to('/cursos/modulo/' . $card->course_id)
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
