<?php

namespace App\Models\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestDiscipline;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Mockery\Matcher\HasKey;

class ContestPlanningCyclesUser extends Model
{
    use HasFactory;

    protected $table = 'contest_planning_cycles_users';

    protected $fillable = [
        'id','user_id','code','contest_discipline_id','contest_user_id',
        'minutes','created_by','order'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function contestUser()
    {
        return $this->belongsTo(ContestUser::class,'contest_user_id','id');
    }
    public function discipline()
    {
        return $this->belongsTo(ContestDiscipline::class,'contest_discipline_id','id');
    }
    public function itemCycle(): HasMany
    {
        return $this->hasMany(ContestControllerCycleUser::class,'planning_cycle_id','id');
    }

    public function hours()
    {
        $horas = floor($this->minutes / 60);
        $minutos = $this->minutes % 60;
        if($horas >=1 ){
            return sprintf('%02d:%02d', $horas, $minutos);
        }else{
            $horas = 0;
            return sprintf('%02d:%02d', $horas, $minutos);
        }
    }


}
