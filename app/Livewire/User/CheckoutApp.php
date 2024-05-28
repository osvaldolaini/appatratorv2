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
        // dd($packPivotCourse);
        $user = Auth::user();
        // $custumer = $user->createOrGetStripeCustomer();
        $custumer = $user->createOrGetAsaasCustomer();
        // $user
        // ->checkout($packPivotApp->price_id, [
        //     'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}',
        //     'cancel_url' => route('checkout-cancel'),
        //     'metadata' => [
        //         'pack_id' => $packPivotApp->id,
        //         'stripe_id' => $custumer->id,
        //     ],
        // ])->redirect();
        // $user
        // ->checkout($packPivotCourse->price_id)
        // ->redirect();
        $this->packPivotApp = $packPivotApp;
        // dd($this->packPivotApp->packageApp);
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
                'pack_id' => $packPivotApp->id,
                'asaas_id' => $user->asaas_id,
            ],
            'callback' => [
                "successUrl" => route('checkout-success'),
                "autoRedirect" => false
            ]
        ];
        // dd($data);
        // if (!isset($this->asaas_id)) {
        $payment = $gateway->payment()->create($data);
        dd($payment);
        redirect()->to($payment['invoiceUrl']);
    }
    // public function render()
    // {
    //     return view('livewire.user.checkout.checkout-app')
    //     ->layout('layouts.'.$this->layout);
    // }
}
