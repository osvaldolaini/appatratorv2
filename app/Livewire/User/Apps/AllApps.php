<?php

namespace App\Livewire\User\Apps;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Http;

class AllApps extends Component
{
    public $breadcrumb = 'Nossos apps';

    public $apps;

    public function render()
    {
        $this->apps = json_encode([
            [
                'title' => 'Mentoria',
                'nick'  => 'mentoring',
            ],
            [
                'title' => 'Questões',
                'nick'  => 'questions',
            ],
            [
                'title' => 'Redação',
                'nick'  => 'essay',
            ],
            [
                'title' => 'Treinamento',
                'nick'  => 'treinament',
            ],
        ]);


        return view('livewire.user.apps.all-apps',[
            'apps' => $this->apps
        ]);
    }
}
