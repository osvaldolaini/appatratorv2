<?php

namespace App\Livewire\User\Apps;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Voucher\PackPivotApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Illuminate\Support\Facades\Http;

class UserAppPacks extends Component
{
    public $breadcrumb = 'Pacotes do aplicativo de ';
    // Define o layout a ser usado
    protected $layout = 'lobby';
    public $packs;
    public $application;
    public function mount($app)
    {
        $this->application  = $app;
        switch ($this->application) {
            case 'questions':
                $this->breadcrumb .= 'Questões';
                break;
            case 'treinament':
                $this->breadcrumb .= 'Treinamento';
                break;
            case 'essay':
                $this->breadcrumb .= 'Redação';
                break;
            case 'mentoring':
                $this->breadcrumb .= 'Mentoria';
                break;
            }
            $this->packs = PackPivotApp::where('application', $this->application)->where('active',1)->get();
    }

    public function render()
    {
        return view('livewire.user.app-packs')
            ->layout('layouts.' . $this->layout);
    }
}
