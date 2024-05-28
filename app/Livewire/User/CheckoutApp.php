<?php

namespace App\Livewire\User;

use App\Models\Admin\Voucher\PackPivotApp;
use App\Services\PaymentGateway\Connectors\AsaasConnector;
use App\Services\PaymentGateway\Gateway;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutApp extends Component
{
    // Define o layout a ser usado
    protected $layout = 'checkout';
    public $packPivotApp;
    public $email;
    public $user_name;

    public function mount(PackPivotApp $packPivotApp)
    {
        $user = Auth::user();
        if (!$user->cpfCnpj) {
            return redirect()->route('profile.user');
        }
        if (!$user->mobilePhone) {
            return redirect()->route('profile.user');
        }
        $user->createOrGetAsaasCustomer();

        $this->packPivotApp = $packPivotApp;
        $this->user_name = $user->name . ' (' . $user->email . ')';

        $adapter = new AsaasConnector();
        $gateway = new Gateway($adapter);

        $data = [
            'customer' => $user->asaas_id,
            'billingType' =>  "UNDEFINED",
            'chargeType' => "DETACHED",
            'value' => valueDB($packPivotApp->value),
            'dueDate' => date('Y-m-d'),
            'description' => $packPivotApp->description,
            'externalReference' => [
                "pack_id" => $packPivotApp->id,
                "pack_type" => 'application',
                "asaas_id" => $user->asaas_id,
            ],
            'callback' => [
                "successUrl" => route('lobby'),
                "autoRedirect" => true
            ]
        ];
        $payment = $gateway->payment()->create($data);
        // dd($payment);
        return redirect()->to($payment['invoiceUrl']);
    }

}
