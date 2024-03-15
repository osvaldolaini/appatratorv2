<?php

namespace App\Livewire\Admin;

use App\Models\Apps\Essay\EssayUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Panel extends Component
{
    public $responses;
    public $essays;
    public function mount()
    {
        if (Auth::user()->group == 'user') {
            return redirect()->route('lobby');
        }
        // if (Auth::user()->group == 'admin') {
        //     return redirect()->route('dashboard');
        //     // $this->responses = Responses::with(['user','question','alternatives'])->orderBy('created_at','desc')->limit(10)->get();
        //     $this->essays = EssayUser::with(['user','voucher','essay'])->orderBy('send_at','desc')->where('status',2)->limit(10)->get();
        // }


    }
    public function render()
    {
        return view('livewire.admin.panel');
    }
}
