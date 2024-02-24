<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class ChangeUserGroups extends Component
{
    public $groups;
    public $user;
    public $group;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->group = $this->user->group;
    }
    public function render()
    {
        return view('livewire.admin.change-user-groups');
    }
    public function changeGroup()
    {
        $this->user->group = $this->group;
        $this->user->save();
    }
}
