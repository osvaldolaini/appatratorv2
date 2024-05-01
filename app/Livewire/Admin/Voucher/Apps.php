<?php

namespace App\Livewire\Admin\Voucher;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Voucher\PackPivotApp;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Apps extends Component
{
    use WithPagination;
    public Course $course;
    public $breadcrumb = 'Aplicativos';
    public $registerId;
    public $showJetModal = false;

    public function render()
    {
        $data = json_encode([
            [
                'title' => 'Mentoria',
                'nick'  => 'mentoring',
                'packs' => PackPivotApp::where('application', 'mentoring')->where('active',1)->get(),
            ],
            [
                'title' => 'Questões',
                'nick'  => 'questions',
                'packs' => PackPivotApp::where('application', 'questions')->where('active',1)->get(),
            ],
            [
                'title' => 'Redação',
                'nick'  => 'essay',
                'packs' => PackPivotApp::where('application', 'essay')->where('active',1)->get(),
            ],
            [
                'title' => 'Treinamento',
                'nick'  => 'treinament',
                'packs' => PackPivotApp::where('application', 'treinament')->where('active',1)->get(),
            ],
        ]);
        return view('livewire.admin.voucher.apps',[
            'dataTable' => json_decode($data)
        ]);
    }
    public function showModalDelete($id)
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
        $data = PackPivotApp::where('id', $id)->first();
        $data->delete();

        $this->openAlert('success', 'Registro excluido com sucesso.');

        $this->showJetModal = false;
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }

}
