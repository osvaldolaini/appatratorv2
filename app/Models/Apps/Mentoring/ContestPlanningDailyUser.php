<?php

namespace App\Models\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestDiscipline;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContestPlanningDailyUser extends Model
{
    use HasFactory;

    protected $table = 'contest_planning_daily_users';

    protected $fillable = [
        'id','user_id','contest_user_id','contest_discipline_id','contest_planning_user_id',
        'minutes','type','order',
        'created_by','code'
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
    public function planning()
    {
        return $this->belongsTo(ContestPlanningUser::class,'contest_planning_user_id','id');
    }
    public function hours()
    {
        $horas = floor($this->minutes / 60);
        $minutos = $this->minutes % 60;
        if($horas >=1 ){
            return sprintf('%02d:%02d', $horas, $minutos);
        }else{
            $horas = 0;
            return sprintf('%02d:%02d', $horas, $minutos); ;
        }
    }
    public function type()
    {
        switch ($this->type) {
            case 'T': return array('type'=>'Teoria','color'=>'bg-yellow-400'); break;
            case 'Q': return array('type'=>'Questões','color'=>'bg-green-400'); break;
            case 'R': return array('type'=>'Revisão','color'=>'bg-blue-400'); break;
            default:  return array('type'=>'Teoria','color'=>'bg-yellow-400'); break;
        }
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }
    public function tasks(): HasMany
    {
        return $this->hasMany(ContestPlanningTasksUser::class,'contest_planning_daily_id','id');
    }

}
