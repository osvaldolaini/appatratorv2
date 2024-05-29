<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\PackPivotCourse;
use App\Services\PaymentGateway\Connectors\AsaasConnector;
use App\Services\PaymentGateway\Gateway;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutCourse extends Component
{
    public $packPivotCourse;
    public $email;
    public $user_name;

    public function mount($price_asaas_id)
    {
        $user = Auth::user();
        if (!$user->cpfCnpj) {
            return redirect()->route('profile.user');
        }
        if (!$user->mobilePhone) {
            return redirect()->route('profile.user');
        }
        $user->createOrGetAsaasCustomer();

        $this->packPivotCourse = PackPivotCourse::where('price_asaas_id',$price_asaas_id)->first();
        dd($this->packPivotCourse);
        $this->user_name = $user->name . ' (' . $user->email . ')';

        $adapter = new AsaasConnector();
        $gateway = new Gateway($adapter);

        $data = [
            'customer' => $user->asaas_id,
            'billingType' =>  "UNDEFINED",
            'chargeType' => "DETACHED",
            'value' => valueDB($this->packPivotCourse->value),
            'dueDate' => date('Y-m-d'),
            'description' => $this->packPivotCourse->description,
            'externalReference' => [
                "pack_id" => $this->packPivotCourse->id,
                "pack_type" => 'application',
                "asaas_id" => $user->asaas_id,
            ],
            'callback' => [
                "successUrl" => route('lobby'),
                "autoRedirect" => true
            ],
            'split' => [
                "walletId" => "6ff70a66-6f2c-41e5-a54c-08bab078415e",
                "percentualValue" => 20.00
            ]

        ];
        $payment = $gateway->payment()->create($data);
        // dd($payment);
        return redirect()->to($payment['invoiceUrl']);
    }

}
