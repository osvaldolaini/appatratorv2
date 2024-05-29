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

    public function mount(PackPivotCourse $packPivotCourse)
    {

        $user = Auth::user();
        if (!$user->cpfCnpj) {
            return redirect()->route('profile.user');
        }
        if (!$user->mobilePhone) {
            return redirect()->route('profile.user');
        }
        $user->createOrGetAsaasCustomer();

        $this->packPivotCourse = $packPivotCourse;
        $this->user_name = $user->name . ' (' . $user->email . ')';

        $adapter = new AsaasConnector();
        $gateway = new Gateway($adapter);

        $data = [
            'customer' => $user->asaas_id,
            'billingType' =>  "UNDEFINED",
            'chargeType' => "DETACHED",
            'value' => valueDB($packPivotCourse->value),
            'dueDate' => date('Y-m-d'),
            'description' => $packPivotCourse->description,
            'externalReference' => [
                "pack_id" => $packPivotCourse->id,
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
