<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PaymentGateway\Connectors\AsaasConnector;
use App\Services\PaymentGateway\Gateway;
use Illuminate\Http\Request;

use Throwable;
use Illuminate\Support\Facades\DB;

class AsaasWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        // $data = $request->all();

        // try {
        //     $adapter = new AsaasConnector();
        // $gateway = new Gateway($adapter);

        // $sessionId = $request['id'];

        // if ($sessionId === null) {
        //     return;
        // }
        // $payment = $gateway->payment()->get($sessionId);

        // return response($payment, 200);

        // } catch (Throwable $th) {
        //     DB::rollBack(); // deu algo errado "desfazemos"
        // }


        return response('OK', 200);
    }
}
