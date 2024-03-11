<?php

namespace App\Models\Apps\Mentoring;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContestPlanningUser extends Model
{
    use HasFactory;

    protected $table = 'contest_planning_users';

    protected $fillable = [
        'id','user_id','code','day','contest_user_id',
        'minutes','questions','created_by'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function contestUser()
    {
        return $this->belongsTo(ContestUser::class,'contest_user_id','id');
    }
    public function daily(): HasMany
    {
        return $this->hasMany(ContestPlanningDailyUser::class);
    }

    public function dayWeek()
    {
        switch ($this->day) {
            case 1: return 'Segunda-feira'; break;
            case 2: return 'Terça-feira'; break;
            case 3: return 'Quarta-feira'; break;
            case 4: return 'Quinta-feira'; break;
            case 5: return 'Sexta-feira'; break;
            case 6: return 'Sabado'; break;
            case 7: return 'Domingo'; break;
        }
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
    public function timeLeft()
    {
        $times = $this->daily()->pluck('minutes');
        $time_used=0;
        if ($times) {
            foreach ($times as $key => $value) {
                $time_used += $value;
            }
        }

        $time_left = $this->minutes - $time_used;
        return $time_left;
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }

}
