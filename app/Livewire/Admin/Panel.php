<?php

namespace App\Livewire\Admin;

use App\Models\Apps\Essay\EssayUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Panel extends Component
{
    public $responses;
    public $essays;
    public $data;
    public function mount()
    {
        if (Auth::user()->group == 'user') {
            return redirect()->route('lobby');
        }
        // $courses = Http::get('https://atratorconcursos.com.br/api/dados-cursos');
        // $this->data = json_encode($courses->json()['data']);
        // dd(json_encode($this->data));

    }
    public function render()
    {
        return view('livewire.admin.panel');
    }
}
