<?php

namespace App\Livewire\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Livewire\Component;

class InsertVouchers extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';

    public function mount()
    {
        $sessionId = $_GET['session_id'];
        // $sessionId = $request->get('session_id');

        if ($sessionId === null) {
            return;
        }

        $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
        dd($session);

        return redirect()->to('/lobby')
            ->with('success', 'Curso adiquirido com sucesso.');
    }
    // public function error()
    // {
    //     $sessionId = $request->get('session_id');

    //     if ($sessionId === null) {
    //         return;
    //     }

    //     $session = Cashier::stripe()->checkout->sessions->retrieve($sessionId);
    //     dd($session);
    // }
}
