<?php

namespace App\Livewire\User;

use App\Models\Admin\Voucher\PackPivotApp;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Laravel\Cashier\Cashier;
use Stripe\Checkout\Session;
use Stripe\Customer;

class CheckoutApp extends Component
{
    public function mount(PackPivotApp $packPivotApp)
    {
        // dd($packPivotCourse);
        $user = Auth::user();
        $custumer = $user->createOrGetStripeCustomer();
        $user
        ->checkout($packPivotApp->price_id, [
            'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout-cancel'),
            'metadata' => [
                'pack_id' => $packPivotApp->id,
                'stripe_id' => $custumer->id,
            ],
        ])->redirect();
        // $user
        // ->checkout($packPivotCourse->price_id)
        // ->redirect();
    }

}
