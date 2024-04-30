<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Http\Controllers\WebhookController;
use Livewire\Component;

class InsertVouchers extends Component
{
    public function handleWebhook(Request $request)
    {
        // Use Laravel Cashier's WebhookController to handle incoming webhook events
        return (new WebhookController)->handleWebhook($request);
        dd($request);
    }
}
