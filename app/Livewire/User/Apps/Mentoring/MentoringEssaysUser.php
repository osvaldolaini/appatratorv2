<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestEssays;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MentoringEssaysUser extends Component
{
    use WithPagination;

    public ContestEssays $contestEssays;
    // Define o layout a ser usado
    protected $layout = 'mentoring';
    public $showJetModal = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;
    public $rules;
    public $model_id;
    public $user_id;
    public $contest_user_id;

    public $day;
    public $full_mark;
    public $mark;

    public function mount()
    {
        //Redireciona para a escolha do curso
        if (Gate::allows('contest-user')) {
            abort(403);
        }
        $this->user_id = Auth::user()->id;
        $this->day = date("d/m/Y");
    }

    public function render()
    {
        $data = DB::table('contest_essays')
            ->where('user_id', $this->user_id)
            ->orderBy('day', 'desc')->orderBy('id', 'desc')->paginate(5);

        return view(
            'livewire.app.mentoring.mentoring-essays-user',
            [
                'data'      => $data,
            ]
        )
            ->layout('layouts.' . $this->layout);

        $this->resetAll();
    }

    //Ressetar as inputs
    public function resetAll()
    {
        $this->day = date("d/m/Y");
        $this->reset('full_mark', 'mark');
    }
    //CREATE
    public function showModalCreate()
    {
        $this->resetAll();
        $this->showModalCreate = true;
    }

    public function store()
    {
        $this->rules = [
            'full_mark' => 'required|max:5',
            'mark' => 'required|max:5',
            'day' => 'required',
        ];
        $this->day = implode(
            "-",
            array_reverse(explode("/", $this->day))
        );
        ContestEssays::create([
            'day'       => $this->day,
            'full_mark' => $this->full_mark,
            'mark'      => $this->mark,
            'user_id'   => $this->user_id,
            'code'      => Str::uuid(),
            'contest_user_id'   => Auth::user()->contest->id,
            'created_by' => Auth::user()->name,
        ]);
        session()->flash('success', 'Registro criado com sucesso');

        $this->alertSession = true;
        $this->showModalCreate = false;
        return redirect()->route('apps.contestEssays.user');
    }
    //UPDATE
    public function showModalEdit(ContestEssays $contestEssays)
    {
        $this->model_id     = $contestEssays->id;
        $this->day          = convertOnlyDate($contestEssays->day);
        $this->full_mark    = $contestEssays->full_mark;
        $this->mark         = $contestEssays->mark;
        $this->showModalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'full_mark' => 'required|max:5',
            'mark' => 'required|max:5',
            'day' => 'required',
        ];
        $this->validate();
        $this->day = implode(
            "-",
            array_reverse(explode("/", $this->day))
        );
        ContestEssays::updateOrCreate([
            'id'         => $this->model_id,
        ], [
            'day'        => $this->day,
            'full_mark'  => $this->full_mark,
            'mark'       => $this->mark,
            'updated_by' => Auth::user()->name,
        ]);

        session()->flash('success', 'Registro atualizado com sucesso');

        $this->alertSession = true;
        $this->showModalEdit = false;
        return redirect()->route('apps.contestEssays.user');
    }
    //DELETE
    public function showModal($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->model_id = $id;
        } else {
            $this->model_id = '';
        }
    }
    public function delete($id)
    {
        $data = ContestEssays::find($id);
        $data->delete();

        session()->flash('success', 'Endereço excluido com sucesso.');

        $this->alertSession = true;
        $this->showJetModal = false;
        return redirect()->route('apps.contestEssays.user');
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}
