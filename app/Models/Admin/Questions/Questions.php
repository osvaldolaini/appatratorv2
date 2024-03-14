<?php

namespace App\Models\Admin\Questions;

use App\Models\Admin\Questions\Filters\Discipline;
use App\Models\Admin\Questions\Filters\EducationArea;
use App\Models\Admin\Questions\Filters\ExaminingBoard;
use App\Models\Admin\Questions\Filters\Institution;
use App\Models\Admin\Questions\Filters\Level;
use App\Models\Admin\Questions\Filters\Modality;
use App\Models\Admin\Questions\Filters\OccupationArea;
use App\Models\Admin\Questions\Filters\Office;
use App\Models\Admin\Questions\Filters\SubMatter;
use App\Models\Admin\Questions\Filters\Matter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Questions extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'questions';

    protected $fillable = [
        'text', 'concurso_for', 'dificult_init','updated_by','created_by','status',
        'institution_id','examining_board_id','occupation_area_indice_id','education_area_indice_id',
        'office_id','level_id','modality_id','discipline_id','matter_id','sub_matter_id',
        'code','year','right_answer'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }


    public function intitution()
    {
        return $this->belongsTo(Institution::class,'institution_id','id');
    }
    public function examining_boards()
    {
        return $this->belongsTo(ExaminingBoard::class,'examining_board_id','id');
    }
    public function occupation_areas()
    {
        return $this->belongsTo(OccupationArea::class,'occupation_area_indice_id','id');
    }
    public function education_areas()
    {
        return $this->belongsTo(EducationArea::class,'education_area_indice_id','id');
    }
    public function offices()
    {
        return $this->belongsTo(Office::class,'office_id','id');
    }
    public function levels()
    {
        return $this->belongsTo(Level::class,'level_id','id');
    }
    public function modalities()
    {
        return $this->belongsTo(Modality::class,'modality_id','id');
    }
    public function disciplines()
    {
        return $this->belongsTo(Discipline::class,'discipline_id','id');
    }
    public function matters()
    {
        return $this->belongsTo(Matter::class,'matter_id','id');
    }
    public function sub_matters()
    {
        return $this->belongsTo(SubMatter::class,'sub_matter_id','id');
    }
    public function alternatives()
    {
        return $this->hasMany(Alternatives::class,'question_id','id');
    }
    public function responses()
    {
        return $this->hasMany(Responses::class,'question_id','id');
    }

    public function getMyHitAttribute()
    {
        $myHit = 0;
        $myResponses = Responses::where('user_id',Auth::user()->id)->where('question_id',$this->id)->get();
        foreach ($myResponses as $response) {
            if($response->alternatives->correct == true){
                $myHit += 1;
            }
        }
        return $myHit;
    }
    public function getMyFaultAttribute()
    {
        $myFault = 0;
        $myResponses = Responses::where('user_id',Auth::user()->id)->where('question_id',$this->id)->get();
        foreach ($myResponses as $response) {
            if($response->alternatives->correct == false){
                $myFault +=1;
            }
        }
        return $myFault;
    }
    public function getAllHitAttribute()
    {
        $allHit = 0;
        $allResponses = Responses::where('question_id',$this->id)->get();
        foreach ($allResponses as $response) {
            if($response->alternatives->correct == true){
                $allHit +=1;
            }
        }
        return $allHit;
    }
    public function getAllFaultAttribute()
    {
        $allFault = 0;
        $allResponses = Responses::where('question_id',$this->id)->get();
        foreach ($allResponses as $response) {
            if($response->alternatives->correct == false){
                $allFault +=1;
            }
        }
        return $allFault;
    }
}

