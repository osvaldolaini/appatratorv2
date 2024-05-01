<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\PackPivotCourse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use Laravel\Cashier\Cashier;

class CheckoutProd extends Component
{
    public function mount(PackPivotCourse $packPivotCourse)
    {
        // dd($packPivotCourse);
        $user = Auth::user();
        $custumer = $user->createOrGetStripeCustomer();
        $custumer
        ->checkout($packPivotCourse->price_id, [
            'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout-cancel'),
            'metadata' => [
                'pack_id' => $packPivotCourse->id,
                'stripe_id' => $custumer->id,
            ],
        ])->redirect();
        // $user
        // ->checkout($packPivotCourse->price_id)
        // ->redirect();
    }

}
