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

class MyEssays extends Component
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
    public $essays;
    public $topics;
    public $viewTopic;


    // Define o layout a ser usado
    protected $layout = 'essay';
    public $breadcrumb = 'Minhas redações';

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
        $this->essays = Essay::where("active", 1)->get();
    }
    public function getTopics()
    {
        $this->topics = Topic::where("active", 1)->where("essay_id",$this->essay_id)->get();
    }
    public function render()
    {
        $this->essayUser = EssayUser::where('status', "!=", 0)
            ->where('user_id', Auth::user()->id)
            ->orderBy('performed_at', 'desc')
            ->get();

        return view('livewire.user.apps.essay.my-essays')->layout('layouts.' . $this->layout);
    }
    //UPLOAD
    public function showModalUpload(EssayUser $essayUser)
    {
        $this->essayUser = $essayUser;
        $this->model_id     = $essayUser->id;
        $this->modalUpload = true;
    }
    public function storagePdf()
    {
        $this->validate([
            'document' => 'required|file|mimes:pdf|max:2048',
        ]);
        $this->essayUser = EssayUser::where('status','!=',0)->where('id',$this->model_id)->first();
        $newName = $this->essayUser->code.'.'.$this->document->getClientOriginalExtension();
        $this->document->storeAs('essays/'.$this->essayUser->id.'/'.$newName );
        $this->openAlert('success', 'Redação enviada com sucesso.');

        EssayUser::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'status'  => 2,
            'send_at' => date("Y-m-d H:i:s"),
        ]);

        $this->modalUpload = false;
        $this->reset('document');
    }
    public function export(EssayUser $essayUser)
    {
        return response()->download(storage_path('app/essays/'.$essayUser->id.'/correcao.pdf'));
    }
    //READ
    public function showView($id)
    {
        $this->showModalView = true;

        if (isset($id)) {
            $data = EssayUser::where('id', $id)->first();
            // dd($data);
            $this->detail = [
                'Redação para'   => $data->essay->title,
                'Realizada'      => $data->performed_at,
                'Enviada'        => $data->send_at,
            ];

               $essayRatings = Rating::where('essay_user_id',$data->id)->get();
               if($essayRatings){
                $points = 0;
                $pp = 0;
                   foreach ($essayRatings as $key) {
                    $points += $key->points;
                    $pp += $key->pivotEssay->points;
                           $this->ratings[$key->pivotEssay->skills->title] = $key->points .' pts / max: '. $key->pivotEssay->points.' pts';
                    }
                    $this->ratings['Total'] = $points .' pts / max: '. $pp.' pts';
               }

        } else {
            $this->ratings = '';
            $this->detail = '';
        }
    }
    //TOPICS
    public function showViewTopic($id)
    {
        $this->showModalViewTopic = true;
        $this->viewTopic = EssayUser::where('id', $id)->first()->topics;
        // dd($this->viewTopic->topics);
    }
    //CREATE
    public function showModalCreate()
    {
        $this->modalCreate = true;
    }
    public function store()
    {
        $voucher = Auth::user()->vouchers
        ->where('active', 1)
        ->where('application', 'essay')
        ->where('limit_access', '>=', date('Y-m-d h:i:s'))
        ->first();

        $this->rules = [
            'essay_id' => 'required',
            'topic_id' => 'required'
        ];

        $this->validate();

        EssayUser::create([
            'essay_id'     => $this->essay_id,
            'topic_id'     => $this->topic_id,
            'status'       => 1,
            'performed_at' => $this->performed_at,
            'code'         => Str::uuid(),
            'voucher_id'   => $voucher->id,
            'user_id'      => Auth::user()->id,
            'created_by'   => Auth::user()->name,
        ]);
        $this->openAlert('success', 'Registro excluido com sucesso.');
        $this->modalCreate = false;
        $this->reset('essay_id', 'performed_at','topic_id');
    }
    //UPDATE
    public function showModalEdit(EssayUser $essayUser)
    {
        $this->model_id     = $essayUser->id;
        $this->performed_at = $essayUser->performed_at;
        $this->essay_id     = $essayUser->essay_id;
        $this->topic_id     = $essayUser->topic_id;
        $this->modalEdit = true;
        $this->topics = Topic::where("active", 1)->where("essay_id",$essayUser->essay_id)->get();
    }
    public function update()
    {
        $this->rules = [
            'essay_id' => 'required',
            'topic_id' => 'required'
        ];
        $this->validate();
        $this->performed_at = implode(
            "-",
            array_reverse(explode("/", $this->performed_at))
        );
        EssayUser::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'essay_id'     => $this->essay_id,
            'topic_id'     => $this->topic_id,
            'performed_at' => $this->performed_at,
        ]);

        $this->openAlert('success', 'Registro atualizado com sucesso.');
        $this->modalEdit = false;
        $this->reset('essay_id', 'performed_at','topic_id');
    }
    //DELETE
    public function showModal($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->registerId = $id;
        } else {
            $this->registerId = '';
        }
    }
    public function delete($id)
    {
        $data = EssayUser::where('id', $id)->first();
        $data->active = '0';
        $data->save();
        $this->openAlert('success', 'Registro excluido com sucesso.');
        $this->showJetModal = false;
    }
    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
