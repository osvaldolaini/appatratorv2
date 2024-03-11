<?php

namespace App\Livewire\User;

use App\Models\Admin\Voucher\Vouchers;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyVouchers extends Component
{
     // Define o layout a ser usado
     protected $layout = 'lobby';

    public $vouchers = [];
    public $voucher_id;
    public $alertSession;
    public $limit_access;

    public $showJetModal = false;
    public $showActiveModal = false;
    public $showInsertModal = false;
    public $code;
    public $rules;

    public function mount()
    {
        $this->vouchers = Auth::user()->vouchers;
    }
    public function render()
    {
        return view('livewire.user.my-vouchers')
        ->layout('layouts.'.$this->layout);
    }
    // public function render()
    // {
    //     return view('livewire.user.user-vouchers',
    //         [
    //             'vouchers' => $this->vouchers,
    //         ]
    //     );
    // }
    //DELETE
    public function showModal($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->voucher_id = $id;
        } else {
            $this->voucher_id = '';
        }
    }
    public function delete($id)
    {
        $data = Vouchers::where('id', $id)->first();
        $data->active = 3;
        $data->save();

        $this->vouchers = Auth::user()->vouchers;
        $this->showJetModal = false;
        $this->openAlert('success', 'Voucher excluido com sucesso.');
    }
    //MESSAGE
    public function openAlert($active, $msg)
    {
        $this->dispatch('openAlert', $active, $msg);
    }
    //ACTIVE
    public function showModalActive($id)
    {
        $this->showActiveModal = true;
        if (isset($id)) {
            $this->voucher_id = $id;
        } else {
            $this->voucher_id = '';
        }
    }
    public function activate($id)
    {
        $data = Vouchers::with('plan')->where('id', $id)->first();
        $days = $data->plan->qtd_days;

        if ($data->plan->unity == 'Unidade') {
            $data->qtd = $data->plan->qtd;
            $days = 365;
        }
        $this->limit_access = date(
            'Y-m-d H:i:s',
            strtotime(
                '+' . $days . ' days',
                strtotime(date('Y-m-d H:i:s'))
            )
        );
        $data->limit_access = $this->limit_access;
        $data->active = 1;
        $data->save();

        $this->vouchers = Auth::user()->vouchers;

        $this->openAlert('success', 'Voucher ativado com sucesso.');
        $this->showActiveModal = false;
    }
    //ACTIVE
    public function showModalInsert()
    {
        $this->showInsertModal = true;
    }
    public function insertVoucher()
    {

        $this->rules = [
            'code' => 'required',
        ];
        $this->validate();
        $data = Vouchers::where('code', $this->code)
            ->first();
        if (empty($data)) {
            $sts = 'info';
            $msg = 'Este voucher não existe, entre em contato com nossa equipe';
        } else {
            if ($data->user_id == null) {
                $sts = 'success';
                $msg = 'Voucher atualizado com sucesso';
                $data->code = $this->code;
                $data->user_id = Auth::user()->id;
                $data->save();
            } else {
                $sts = 'warning';
                $msg = 'Este voucher já está em uso';
            }
        }

        $this->vouchers = Auth::user()->vouchers;

        $this->openAlert($sts, $msg);
        $this->showInsertModal = false;
        $this->reset('code');
    }
}
