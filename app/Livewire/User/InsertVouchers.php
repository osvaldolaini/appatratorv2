<?php

namespace App\Livewire\User;

use App\Models\Admin\Course\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InsertVouchers extends Component
{
    // Define o layout a ser usado
    protected $layout = 'lobby';

    public $vouchers;
    public function mount(Request $request)
    {
        dd($request);
        $this->vouchers = Auth::user()->vouchers
            ->where('active', 1)
            ->where('limit_access', '>=', date('Y-m-d h:i:s'))
            ->unique('application');
            return redirect()->to('/lobby')
            ->with('success', 'Curso adiquirido com sucesso.');
    }
}
