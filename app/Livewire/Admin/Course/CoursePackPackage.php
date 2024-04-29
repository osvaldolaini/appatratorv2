<?php

namespace App\Livewire\Admin\Course;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\PackPivotCourse;
use App\Models\Admin\Voucher\Package;
use App\Models\Admin\Voucher\Plans;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class CoursePackPackage extends Component
{
    use WithPagination;
    public Package $Package;
    public PackPivotCourse $packPivotCourse;
    public $breadcrumb = 'Pacote';

    public $showJetModal = false;
    public $showModalView = false;
    public $showModalCreate = false;
    public $showModalEdit = false;
    public $alertSession = false;
    public $rules;
    public $detail;
    public $logs;
    public $registerId;

    public $plans;

    //Search
    public $modalSearch = false;
    public $inputSearch;
    public $typeSearch;
    public $results;
    public $user;

    //Campos
    public $active = 0;
    public $type;
    public $plan_id;
    public $code;
    public $application;
    public $applications;
    public $course_id;
    public $pkt_course_id;
    public $courses;
    public $pack_id;

    public $pack_courses;
    public $pack_apps;
    public $removeCourse;
    public $removeApp;

    public function mount(PackPivotCourse $packPivotCourse)
    {
        $this->breadcrumb   = $packPivotCourse->title;
        $this->pack_id      = $packPivotCourse->id;
        $this->pkt_course_id   = $packPivotCourse->courses_id;
        $this->courses      = Course::where('active', 1)->get();
        $this->plans        = Plans::where('active', 1)->get();
    }
    public function resetAll()
    {
        $this->reset(
            'type',
            'course_id',
            'application',
            'plan_id',
        );
    }
    public function render()
    {
        $packs =Package::where('active', 1)->where('pack_pivot_course_id', $this->pack_id)->get();
        $this->pack_apps = $packs->where('application','!=',null);
        $this->pack_courses = $packs->where('course_id','!=',null);
        $this->removeCourse = Package::where('active', 1)->where('pack_pivot_course_id', $this->pack_id)
        ->pluck('course_id')->toArray();
        $this->removeApp = Package::where('active', 1)->where('pack_pivot_course_id', $this->pack_id)
        ->pluck('application')->toArray();

        return view('livewire.admin.courses.course-pack-packages');
    }

    public function openModalSearch($typeSearch)
    {
        $this->modalSearch = true;
        $this->typeSearch = $typeSearch;
    }

    //CREATE
    public function modalInsert()
    {
        $this->resetAll();
        $this->showModalCreate = true;
    }

    public function store()
    {
        $this->rules = [
            'plan_id' => 'required|min:1|max:10',
        ];

        $this->validate();

        $code = Str::uuid();

        Package::create([
            'pack_pivot_course_id'  => $this->pack_id,
            'plan_id'               => $this->plan_id,
            'course_id'             => $this->course_id,
            'application'           => $this->application,
            'active'                => 1,
            'code'                  => $code,
            'created_by'            => Auth::user()->name,
        ]);


        $this->openAlert('success', 'Registro criado com sucesso.');

        $this->showModalCreate = false;

        $this->resetAll();
    }


    //DELETE
    public function showModalDelete($id)
    {
        $this->showJetModal = true;
        if (isset($id)) {
            $this->registerId = $id;
        } else {
            $this->registerId = '';
        }
    }
    //ACTIVE
    public function buttonActive($id)
    {
        $data = Package::where('id', $id)->first();
        if ($data->active == 1) {
            $data->active = 0;
            $data->save();
        } else {
            $data->active = 1;
            $data->save();
        }
        $this->openAlert('success', 'Registro atualizado com sucesso.');
    }
    public function delete($id)
    {
        $data = Package::find($id);
        $data->delete();

        $this->openAlert('success', 'Registro excluido com sucesso.');

        $this->showJetModal = false;
    }

    public function back()
    {
        return redirect()->to('/cursos/valores/'.$this->pkt_course_id);
    }

    //MESSAGE
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
