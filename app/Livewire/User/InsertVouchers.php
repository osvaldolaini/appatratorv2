<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InsertVouchers extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';

    public $vouchers;
    public function mount(Request $request)
    {
        dd($request->get('session_id'));

        $session_id = $request->get('session_id');
        $stripe = new \Stripe\StripeClient('sk_test_51Oy0KQP5zhpt1xr74jcSVyLDeVqGvmvMDCQ05vZlF6M8ug3jf1MbTw9CeT2nBnmsGxCQy10zNNLqWZV4KF4Cn1Dy00C4hLyCrE');
        $stripe->checkout->sessions->retrieve(
            \Stripe\Stripe::setApiKey(env('STRIPE_SECRET')),
            []
        );

        $this->vouchers = Auth::user()->vouchers
            ->where('active', 1)
            ->where('limit_access', '>=', date('Y-m-d h:i:s'))
            ->unique('application');
        return redirect()->to('/lobby')
            ->with('success', 'Curso adiquirido com sucesso.');
    }
}
