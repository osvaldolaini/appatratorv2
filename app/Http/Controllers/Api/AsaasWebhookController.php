<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PaymentGateway\Connectors\AsaasConnector;
use App\Services\PaymentGateway\Gateway;
use Illuminate\Http\Request;

use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AsaasWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        Log::info('Webhook recebido do Asaas:', $request->all());
        return response()->json(['message' => 'Webhook recebido com sucesso'], 200);
    }
}
