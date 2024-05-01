<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Course\PackPivotCourse;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Cashier\Cashier;
use Illuminate\Support\Str;

class ResponseCheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function success(Request $request)
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
        dd($session);

        $pack_id = $session['metadata']['pack_id'] ?? null;
        if (User::where('email',$session['customer_details']['email'])->first()) {
            $user = User::where('email',$session['customer_details']['email'])->first();
            // dd($user);
        }else{
            $user =  User::create([
                'name' => $session['customer_details']['name'],
                'email' => $session['customer_details']['email'],
                'password' => Hash::make(123456789),
                'group'=>'user',
                'stripe_id'=>$session['metadata']['stripe_id'],
            ]);
            // dd($user);
        }

        $pack = PackPivotCourse::findOrFail($pack_id);

        if ($pack->package) {
            foreach ($pack->package as $voucher) {
                Vouchers::create([
                    'plan_id'       =>$voucher->plan_id,
                    'user_id'       =>$user->id,
                    'package_id'    =>$voucher->id,
                    'course_id'     =>$voucher->course_id,
                    'application'   =>($voucher->application == '' ? 'courses':$voucher->application),
                    'active'        => 1,
                    'code'          =>Str::uuid(),
                    'created_by'    =>Auth::user()->name,
                ]);
            }
        }

        return redirect()->to('/lobby')
            ->with('success', 'Curso adiquirido com sucesso.');
    }
    public function error()
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
        dd($session);

        $pack_id = $session['metadata']['pack_id'] ?? null;
        if (User::where('email',$session['customer_details']['email'])->first()) {
            $user = User::where('email',$session['customer_details']['email'])->first();
            // dd($user);
        }else{
            $user =  User::create([
                'name' => $session['customer_details']['name'],
                'email' => $session['customer_details']['email'],
                'password' => Hash::make(123456789),
                'group'=>'user',
                'stripe_id'=>$session['metadata']['stripe_id'],
            ]);
            // dd($user);
        }

        $pack = PackPivotCourse::findOrFail($pack_id);

        if ($pack->package) {
            foreach ($pack->package as $voucher) {
                Vouchers::create([
                    'plan_id'       =>$voucher->plan_id,
                    'user_id'       =>$user->id,
                    'package_id'    =>$voucher->id,
                    'course_id'     =>$voucher->course_id,
                    'application'   =>($voucher->application == '' ? 'courses':$voucher->application),
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
