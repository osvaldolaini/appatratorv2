<?php

namespace App\Livewire\Admin\Essay;

use App\Models\Admin\Essay\Topic;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class TopicsBase extends Component
{
    use WithPagination;
    public Topic $topic;
    public $breadcrumb = 'Tema: ';
    public $rules;
    public $base;
    public $id;

    public function mount(Topic $topic)
    {
        $this->id = $topic->id;
        $this->base = $topic->base;
        $this->breadcrumb .= $topic->title;
    }
    public function render()
    {
        return view('livewire.admin.essay.topic-base');
    }
    public function resetAll()
    {
        $this->reset(
            'base',
        );
    }

    public function update()
    {
        $this->rules = [
            'base' => 'required',
        ];

        $this->validate();

        Topic::updateOrCreate([
            'id' => $this->id,
        ], [
            'base'          => $this->base,
            'updated_by' => Auth::user()->name,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');
        $this->resetAll();
    }

    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
