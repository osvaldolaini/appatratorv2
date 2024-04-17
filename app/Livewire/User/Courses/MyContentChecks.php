<?php

namespace App\Livewire\User\Courses;

use App\Models\Apps\Course\MyContent;
use App\Models\Apps\Course\MyContentCheck;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyContentChecks extends Component
{
    public $content_id;

    public function mount($content_id)
    {
        $this->content_id = $content_id;
    }
    public function render()
    {
        return view('livewire.user.courses.content-check',[
            'content'=> MyContent::find($this->content_id),
        ]);
    }

    public function check($content_id)
    {
        $this->content_id = $content_id;
        $content = MyContent::find($this->content_id);
        if ($this->content_id ) {
            $check = MyContentCheck::where('content_id',$this->content_id)->where('user_id',Auth::user()->id)->first();
            if($check != null){
                $check->delete();
            }else{
                MyContentCheck::create([
                    'content_id' => $this->content_id,
                    'module_id' => $content->module_id,
                    'user_id'   => Auth::user()->id,
                ]);
            }
        }
        $this->dispatch('check');

    }
}
