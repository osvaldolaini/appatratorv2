<?php

namespace App\Http\Livewire\App\Mentoring;

use App\Models\User\Mentoring\ContestSimulated;
use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MentoringSimulatedsUser extends Component
{
    use WithPagination;

    public ContestSimulated $contestSimulated;
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
    public $qtd;
    public $hits;
    public $misses;
    public $guesses;
    public $blanks;
    public $grade;

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
        $data = DB::table('contest_simulateds')
            ->where('user_id', $this->user_id)
            ->orderBy('day', 'desc')->paginate(5);
        return view('livewire.app.mentoring.mentoring-simulateds-user',
        [
            'data'      => $data,
        ])
            ->layout('layouts.' . $this->layout);
    }
        //Ressetar as inputs
        public function resetAll()
        {
            $this->day = date("d/m/Y");
            $this->reset('blanks',
            'qtd',
             'hits',
              'misses',
              'guesses',
              'grade');
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
            'qtd'       => 'required|max:5',
            'hits'      => 'required|max:5',
            'blanks'    => 'max:5',
            'misses'    => 'required|max:5',
            'guesses'   => 'max:5',
            'grade'     => 'required|max:5',
            'day'       => 'required',
        ];
        $this->day = implode(
            "-",
            array_reverse(explode("/", $this->day))
        );
        ContestSimulated::create([
            'day'       => $this->day,
            'qtd'       => $this->qtd,
            'hits'      => $this->hits,
            'blanks'    => $this->blanks,
            'misses'    => $this->misses,
            'guesses'   => $this->guesses,
            'grade'     => str_replace(",",".", $this->grade),
            'user_id'   => $this->user_id,
            'contest_user_id'   => Auth::user()->contest->id,
            'code'      => Str::uuid(),
            'created_by' => Auth::user()->name,
        ]);
        session()->flash('success', 'Registro criado com sucesso');

        $this->alertSession = true;
        $this->showModalCreate = false;
        return redirect()->route('apps.contestSimulateds.user');
    }
    //UPDATE
    public function showModalEdit(ContestSimulated $contestSimulated)
    {
        $this->model_id = $contestSimulated->id;
        $this->day      = convertOnlyDate($contestSimulated->day);
        $this->qtd      = $contestSimulated->qtd;
        $this->hits     = $contestSimulated->hits;
        $this->blanks   = $contestSimulated->blanks;
        $this->misses   = $contestSimulated->misses;
        $this->guesses  = $contestSimulated->guesses;
        $this->grade    = str_replace(".",",", $contestSimulated->grade);
        $this->showModalEdit = true;
    }
    public function update()
    {
        $this->rules = [
            'qtd'       => 'required|max:5',
            'hits'      => 'required|max:5',
            'blanks'    => 'max:5',
            'misses'    => 'required|max:5',
            'guesses'   => 'max:5',
            'grade'     => 'required|max:5',
            'day'       => 'required',
        ];
        $this->validate();
        $this->day = implode(
            "-",
            array_reverse(explode("/", $this->day))
        );
        ContestSimulated::updateOrCreate([
            'id' => $this->model_id,
        ], [
            'day'       => $this->day,
            'qtd'       => $this->qtd,
            'hits'      => $this->hits,
            'blanks'    => $this->blanks,
            'misses'    => $this->misses,
            'guesses'   => $this->guesses,
            'grade'     => str_replace(",",".", $this->grade),
            'updated_by' => Auth::user()->name,
        ]);

        session()->flash('success', 'Registro atualizado com sucesso');

        $this->alertSession = true;
        $this->showModalEdit = false;
        return redirect()->route('apps.contestSimulateds.user');
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
        $data = ContestSimulated::find($id);
        $data->delete();

        session()->flash('success', 'Endereço excluido com sucesso.');

        $this->alertSession = true;
        $this->showJetModal = false;
        return redirect()->route('apps.contestSimulateds.user');
    }
    //Fecha a caixa da mensagem
    public function closeAlert()
    {
        $this->alertSession = false;
    }
}
