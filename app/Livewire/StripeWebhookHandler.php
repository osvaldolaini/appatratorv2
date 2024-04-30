<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StripeWebhookHandler extends Component
{
    public $webhookData = [];

    public function mount($request)
    {
        dd($request,$this->webhookData);
        // Aqui você pode executar qualquer lógica necessária para inicializar o componente
    }

    public function render()
    {

        return view('livewire.stripe-webhook-handler');
    }
}
