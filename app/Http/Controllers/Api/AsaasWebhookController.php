<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course\PackPivotCourse;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\User;
use App\Services\PaymentGateway\Connectors\AsaasConnector;
use App\Services\PaymentGateway\Gateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AsaasWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $adapter = new AsaasConnector();
        $gateway = new Gateway($adapter);
        $sessionId = $request->payment['id'];

        $payment = $gateway->payment()->get($sessionId);
        return response()->json(['message' => $payment['status']], 200);
        if ($payment['status'] !== 'PENDING') {
            return response()->json(['message' => 'Não foi pago'], 200);
        }
        $custumer = $gateway->customer()->list(['id' => $payment['customer']]);
        // $pack_id = $payment['externalReference']['pack_id'] ?? null;
        // if (User::where('email',$payment['customer_details']['email'])->first()) {
        //     $user = User::where('email',$payment['customer_details']['email'])->first();
        // }else{
        //     $user =  User::create([
        //         'name' => $payment['customer_details']['name'],
        //         'email' => $payment['customer_details']['email'],
        //         'password' => Hash::make(123456789),
        //         'group'=>'user',
        //         'stripe_id'=>$payment['metadata']['stripe_id'],
        //     ]);
        // }

        // $pack = PackPivotCourse::findOrFail($pack_id);

        // if ($pack->package) {
        //     foreach ($pack->package as $voucher) {
        //         Vouchers::create([
        //             'plan_id'       =>$voucher->plan_id,
        //             'user_id'       =>$user->id,
        //             'package_id'    =>$voucher->id,
        //             'course_id'     =>$voucher->course_id,
        //             'application'   =>($voucher->application == '' ? 'courses':$voucher->application),
        //             'active'        => 1,
        //             'code'          =>Str::uuid(),
        //             'created_by'    =>Auth::user()->name,
        //         ]);
        //     }
        // }

        return response()->json(['message' => $custumer], 200);
    }
}
