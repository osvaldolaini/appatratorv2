<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\PackPivotCourse;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Cashier;
use Livewire\Component;
use Illuminate\Support\Str;

class PaymentSuccess extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';

    public function mount(Request $request)
    {
        // $sessionId = $_GET['session_id'];
        $sessionId = $request->get('session_id');

        if ($sessionId === null) {
            return;
        }

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        if ($session->payment_status !== 'paid') {
            return;
        }

        $pack_id = $session['metadata']['pack_id'] ?? null;
        $custumer = $session['customer_details'];
        if (User::where('email',$custumer['email'])->get()) {
            $user = User::where('email',$custumer['email'])->get();
        }else{
            $user =  User::create([
                'name' => $session['customer_details']['name'],
                'email' => $session['customer_details']['email'],
                'password' => Hash::make(123456789),
                'group'=>'user'
            ]);
        }

        $pack = PackPivotCourse::findOrFail($pack_id);

        if ($pack->package) {
            foreach ($pack->package as $voucher) {
                Vouchers::create([
                    'plan_id'       =>$voucher->plan_id,
                    'user_id'       =>$user->id,
                    'course_id'     =>$voucher->course_id,
                    'application'   =>$voucher->application,
                    'active'        => 1,
                    'code'          =>Str::uuid(),
                    'created_by'    =>Auth::user()->name,
                ]);
            }
        }

        return redirect()->to('/lobby')
            ->with('success', 'Curso adiquirido com sucesso.');
    }

}
