<?php

namespace App\Livewire\User\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestDiscipline;
use App\Models\Admin\Mentoring\ContestMatter;
use App\Models\Apps\Mentoring\ContestQuestions;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;

class MentoringQuestionsUserCount extends Component
{
    public $discipline;
    public function mount(ContestDiscipline $discipline)
    {
        $this->discipline = $discipline;
    }
    #[On('new-question')]
    public function render()
    {
        return view(
            'livewire.user.apps.mentoring.mentoring-questions-user-count',
            [
                'discipline' => $this->discipline->performances
            ]
        );
    }
}
