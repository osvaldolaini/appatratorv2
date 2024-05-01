<?php


namespace App\Livewire\Admin\Voucher;

use App\Models\Admin\Voucher\PackPivotApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class AppPackDescription extends Component
{
    public $breadcrumb_title;
    //Dados principais
    public $id;
    public $description;
    public $course;
    public $application;

    public function mount(PackPivotApp $packPivotApp)
    {
        $this->breadcrumb_title = $packPivotApp->title;

        $this->id = $packPivotApp->id;
        $this->description = $packPivotApp->description;
        $this->application = $packPivotApp->application;
    }

    public function render()
    {
        return view('livewire.admin.voucher.app-pack-description');
    }
    public function back()
    {
        return redirect()->to('/aplicativos/valores/'.$this->application);
    }
    public function save()
    {
        PackPivotApp::updateOrCreate([
            'id'        => $this->id,
        ], [
            'description'         => $this->description,
            'updated_by'          => Auth::user()->name,
        ]);

        return redirect()->to('/aplicativos/pacotes/'.$this->application)
            ->with('success', 'Curso criado com sucesso.');
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
