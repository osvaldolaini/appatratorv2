<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckoutProd extends Component
{
    public function mount(Course $course)
    {
        $user = Auth::user();
        // dd($user->createOrGetStripeCustomer());
        $user
        ->checkout($course->price_id)
        ->redirect();
    }

}
