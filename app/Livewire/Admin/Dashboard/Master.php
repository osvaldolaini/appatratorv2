<?php

namespace App\Livewire\Admin\Dashboard;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Master extends Component
{
    public function mount()
    {
        $courses = Http::get('https://atratorconcursos.com.br/api/apiCourses');
        $dados = $courses->json();
        dd($dados);
    }
    public function render()
    {
        switch (Auth::user()->dashboard) {
            case 1:
                return view('livewire.admin.dashboard.master');
                break;
        }
    }

    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
