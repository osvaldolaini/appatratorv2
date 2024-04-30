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
        $user
        ->checkout($course->price_id, [
            'success_url' => route('checkout-success').'?session_id={CHECKOUT_SESSION_ID}',
            // 'cancel_url' => route('checkout-cancel'),
            'metadata' => ['course_id' => $course->id],
        ])->redirect();
    }

}
