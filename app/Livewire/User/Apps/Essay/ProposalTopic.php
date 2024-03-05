<?php

namespace App\Livewire\User\Apps\Essay;

use App\Http\Livewire\Admin\Essay\Ratings;
use App\Models\Admin\Essay\Essay;
use App\Models\Apps\Essay\EssayUser;
use App\Models\Admin\Essay\Rating;
use App\Models\Admin\Essay\Topic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProposalTopic extends Component
{
    use WithFileUploads;
    public $showJetModal = false;
    public $showModalView = false;
    public $modalCreate = false;
    public $modalEdit = false;
    public $modalUpload = false;
    public $showModalViewTopic = false;
    public $registerId;
    public $detail;
    public $ratings;
    public $alertSession = false;

    public $essay_id;
    public $essayUser;
    public $vouchers;
    public $access;
    public $status = 1;
    public $code;
    public $document;
    public $topic_id;
    public $performed_at;
    public $rules;
    public $message;
    public $model_id;
    public $topicTitle;
    public $topics;
    public $topic;


    // Define o layout a ser usado
    protected $layout = 'essay';
    public $breadcrumb = 'Temas propostos';

    public function mount()
    {
        $this->essayUser = EssayUser::where('status', "!=", 0)
            ->where('user_id', Auth::user()->id)
            ->orderBy('performed_at', 'desc')
            ->get();

        $this->vouchers = Auth::user()->vouchers
            ->where('active', 1)
            ->where('application', 'essay')
            ->where('limit_access', '>=', date('Y-m-d h:i:s'));

        $qtd_voucher = 0;

        // dd($this->vouchers);
        foreach ($this->vouchers as $voucher) {
            $qtd_voucher += $voucher->qtd;
        }
        if ($qtd_voucher > $this->essayUser->count()) {
            $this->access = true;
        }
        $this->topics = Topic::where("active", 1)->orderBy('created_at')->get()->shuffle();

    }

    public function render()
    {
        return view('livewire.user.apps.essay.topics')->layout('layouts.' . $this->layout);
    }

    //CREATE
    public function showModalCreate(Topic $topic)
    {
        $this->topic = $topic;
        $this->topicTitle = $topic->title;
        $this->modalCreate = true;
    }
    public function store()
    {
        $voucher = Auth::user()->vouchers
        ->where('active', 1)
        ->where('application', 'essay')
        ->where('limit_access', '>=', date('Y-m-d h:i:s'))
        ->first();

        EssayUser::create([
            'essay_id'     => $this->topic->essay_id,
            'topic_id'     => $this->topic->id,
            'status'       => 1,
            'performed_at' => date('d/m/Y'),
            'code'         => Str::uuid(),
            'voucher_id'   => $voucher->id,
            'user_id'      => Auth::user()->id,
            'created_by'   => Auth::user()->name,
        ]);

        return redirect()->to('app-de-redação/minhas-redações')
            ->with('success', 'Registro criado com sucesso.');

    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }

}
