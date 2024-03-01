<?php

namespace App\Livewire\Admin\Essay;

use App\Models\Admin\Essay\Topic;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class TopicsProposal extends Component
{
    use WithPagination;
    public Topic $topic;
    public $breadcrumb = 'Tema: ';
    public $rules;
    public $proposal;
    public $id;

    public function mount(Topic $topic)
    {
        $this->id = $topic->id;
        $this->proposal = $topic->proposal;
        $this->breadcrumb .= $topic->title;
    }
    public function render()
    {
        return view('livewire.admin.essay.topic-proposal');
    }
    public function resetAll()
    {
        $this->reset(
            'proposal',
        );
    }

    public function update()
    {
        $this->rules = [
            'proposal' => 'required',
        ];

        $this->validate();

        Topic::updateOrCreate([
            'id' => $this->id,
        ], [
            'proposal'                 => $this->proposal,
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
