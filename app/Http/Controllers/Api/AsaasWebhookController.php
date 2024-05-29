<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Course\PackPivotCourse;
use App\Models\Admin\Voucher\PackPivotApp;
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
        //teste
        // $sessionId = 'pay_uh2lygkcomdd1f2g';
        //Pega os dados do pagamento
        $payment = $gateway->payment()->get($sessionId);
        if ($payment['status'] == 'PENDING') {
            return response()->json(['message' => 'Não foi pago'], 200);
        }
        //Pega os dados do cliente
        $custumer = $gateway->customer()->list(['id' => $payment['customer']]);
        if (User::where('email',$custumer['email'])->first()) {
            $user = User::where('email',$custumer['email'])->first();
        }else{
            $user =  User::create([
                'name' => $custumer['name'],
                'email' => $custumer['email'],
                'password' => Hash::make(123456789),
                'group'=>'user',
                'asaas_id'=>$payment['customer'],
            ]);
        }

        //Pega os dados do pacote
        $externalReferenceObject = json_decode( $payment['externalReference'], true);
        $pack_id = $externalReferenceObject['pack_id'];
        if ($externalReferenceObject['pack_type'] == 'application') {
            $pack = PackPivotApp::find($pack_id);
        } else {
            $pack = PackPivotCourse::find($pack_id);
        }

        if ($pack->package) {
            foreach ($pack->package as $voucher) {
                Vouchers::create([
                    'plan_id'       =>$voucher->plan_id,
                    'user_id'       =>$user->id,
                    'package_id'    =>$voucher->id,
                    'course_id'     =>$voucher->course_id,
                    'application'   =>($voucher->application == '' ? 'courses': $voucher->application),
                    'active'        => 1,
                    'code'          =>Str::uuid(),
                    'created_by'    =>Auth::user()->name,
                ]);
            }
        }

        return response()->json(['message' => 'Processo concluido com sucesso'], 200);
    }
}
