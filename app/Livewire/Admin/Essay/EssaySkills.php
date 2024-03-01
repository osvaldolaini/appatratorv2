<?php

namespace App\Livewire\Admin\Essay;

use App\Models\Admin\Essay\Essay;
use App\Models\Admin\Essay\PivotSkillsEssays;
use App\Models\Admin\Essay\Skill;
use Livewire\Component;


class EssaySkills extends Component
{
    //CONFIGURAÇÕES
    public $id;
    public $breadcrumb = 'Competências da redação: ';
    public $skills;
    public $skill_id;
    public $pivot;
    public $registerId;
    public $pivotSkills = [];
    public $pivot_item;

    public $showJetModal = false;
    public $modalEdit = false;

    protected $listeners =
    [
        'closeModal',
    ];

    public function render()
    {
        return view('livewire.admin.essay.essay-skills');
    }
    public function mount(Essay $essay)
    {
        $this->id = $essay->id;
        $this->skills = Skill::where('active', 1)->get();
        $this->resetSelect();
    }
    public function insertSkill()
    {
        PivotSkillsEssays::create([
            'skill_id'  => $this->skill_id,
            'essay_id'  => $this->id,
            'active'    => 1,
        ]);
        $this->resetSelect();
    }
    //UPDATE
    public function showModalEdit(PivotSkillsEssays $pivotSkillsEssays)
    {
        $this->pivot_item = $pivotSkillsEssays;
        $this->modalEdit = true;
    }
    public function closeModal()
    {
        $this->modalEdit = false;
    }
    //DELETE
    public function showModal($id)
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
        $data = PivotSkillsEssays::where('id', $id)->first();
        $data->active = '0';
        $data->save();

        session()->flash('success', 'Registro excluido com sucesso.');

        $this->showJetModal = false;
        $this->reset('skill_id');
        $this->resetSelect();
    }
    public function resetSelect()
    {
        $this->pivot = PivotSkillsEssays::where('active', 1)->where('essay_id', $this->id)->get();
        $this->pivotSkills = $this->pivot->map(
            fn ($qry) => [
                'id' => $qry->skill_id
            ]
        )->pluck('id')->toArray();
    }


    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
