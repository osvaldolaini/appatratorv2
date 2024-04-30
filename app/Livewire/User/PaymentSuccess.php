<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;
use Livewire\Component;

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

        $course_id = $session['metadata']['course_id'] ?? null;

        $course = Course::findOrFail($course_id);
        dd($course);

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
