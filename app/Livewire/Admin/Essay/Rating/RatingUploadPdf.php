<?php

namespace App\Livewire\Admin\Essay\Rating;

use App\Models\Admin\Voucher\Vouchers;
use App\Models\Apps\Essay\EssayUser;
use Livewire\WithFileUploads;
use Livewire\Component;

class RatingUploadPdf extends Component
{
    use WithFileUploads;
    public $rate;
    public $model_id;
    public $ratings;
    public $essayUser;
    public $pivotSkills;
    public $alertSession = false;
    public $document;
    public $upload_rating_at;

    public function mount(EssayUser $essayUser)
    {
        $this->essayUser=$essayUser;
        $this->model_id=$essayUser->id;
        $this->upload_rating_at = $essayUser->upload_rating_at;
    }
    public function render()
    {
        return view('livewire.admin.essay.rating-upload-pdf');
    }
    public function export(EssayUser $essayUser)
    {
        return response()->download(storage_path('app/essays/'.$essayUser->id.'/correcao.pdf'));
    }

    public function storagePdf()
    {
        $this->validate([
            'document' => 'required|file|mimes:pdf|max:2048',
        ]);

        $newName = 'correcao.'.$this->document->getClientOriginalExtension();
        $this->document->storeAs('essays/'.$this->essayUser->id.'/'.$newName );
        $this->openAlert('success', 'Correção enviada com sucesso.');

        EssayUser::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'status'  => 3,
            'upload_rating_at' => date("Y-m-d H:i:s"),
        ]);

        $essays = EssayUser::where('status',3)->where('voucher_id',$this->essayUser->voucher_id)->get();

        if ($essays->count() >= $this->essayUser->voucher->qtd) {
            Vouchers::updateOrCreate([
                'id' => $this->essayUser->voucher_id,
            ], [
                'status'  => 4,
            ]);
        }

        $this->reset('document');

    }
     //MESSAGE
     public function openAlert($status, $msg)
     {
         $this->dispatch('openAlert', $status, $msg);
     }
}
