<?php

namespace App\Livewire\User\Apps\Questions;

use App\Models\Admin\Questions\Alternatives;
use App\Models\Admin\Questions\Questions;
use App\Models\Admin\Questions\Responses;
use Livewire\Component;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;
use Nette\Utils\Random;

class Response extends Component
{
    public $alternative_id;
    public $myHit = 0;
    public $myFault = 0;
    public $allHit = 0;
    public $allFault = 0;
    public $responses;
    public $allResponses;
    public $myResponses;
    public $vouchers;
    public $access;
    public $right_answer;

    public $showCorrectResponse = false;

    protected $rules = [
        'alternative_id' => 'required',
    ];
    protected $messages = [
        'alternative_id.required' => 'Escolha uma alternativa.',
    ];
    public $question;

    public function mount($question){
        $this->myResponses = Responses::where('user_id',Auth::user()->id)->where('question_id',$question->id)->get();
        foreach ($this->myResponses as $response) {
            if($response->alternatives->correct == true){
                $this->myHit += 1;
            }else{
                $this->myFault +=1;
            }
        }
        $this->allResponses = Responses::where('user_id',Auth::user()->id)->where('question_id',$question->id)->get();
        foreach ($this->allResponses as $response) {
            if($response->alternatives->correct == true){
                $this->allHit += 1;
            }else{
                $this->allFault +=1;
            }
        }
        $this->vouchers = Auth::user()->vouchers
                        ->where('active',1)
                        ->where('limit_access','>=', date('Y-m-d h:i:s'));
        foreach ($this->vouchers as $voucher) {
            if ($voucher->application == 'questions'){
                $this->access = true;
            }
        }
    }
    public function render()
    {
        return view('livewire.user.apps.questions.responses');
    }
    public function refresh($status)
    {
        if($status == true){
            $this->myHit += 1;
            $this->allHit += 1;
        }else{
            $this->myFault +=1;
            $this->allFault +=1;
        }
    }
    public function submit()
    {
        $this->validate();
        $alternative = Alternatives::select('question_id')->where('id',$this->alternative_id)->first();
        $response =  Responses::create([
            'user_id'           =>Auth::user()->id,
            'alternative_id'    =>$this->alternative_id,
            'question_id'       =>$alternative->question_id,
            'code'              =>Str::uuid(),
        ]);

        $msgcorrect = array(
            'Acertou mizeravi','Boa 06','Excelente'
        );
        $msgcerror = array(
            'Errooouuuu','Não foi dessa vez','Tente novamente'
        );
        shuffle($msgcorrect);
        shuffle($msgcerror);
        if($response->alternatives->correct == true){
            $this->openAlert('success', $msgcorrect[0]);
            $this->refresh(true);
        }else{
            $this->right_answer = $alternative->question->right_answer;
            if ($this->right_answer){
                $this->showCorrectResponse = true;
                $this->right_answer = $alternative->question->right_answer;
            }

            $this->openAlert('error', $msgcerror[0]);
            $this->refresh(false);
        }

    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }



}
