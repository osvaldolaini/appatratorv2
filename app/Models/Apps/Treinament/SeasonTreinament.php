<?php

namespace App\Models\Apps\Treinament;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SeasonTreinament extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'season_treinaments';

    protected $fillable = [
        'id','user_id','season_id','status','day'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
    public function getDayAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d', $value)
                ->format('d/m/Y');
        }
    }
    public function setDayAttribute($value)
    {
        if ($value != "") {
            $this->attributes['day'] = implode("-", array_reverse(explode("/", $value)));
            if($this->trainings)
            {
                foreach ($this->trainings as $training) {
                    $training->day = implode("-", array_reverse(explode("/", $value)));
                    $training->save();
                }
            }
        } else {
            $this->attributes['day'] = NULL;
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function trainings()
    {
        return $this->hasMany(Training::class,'season_treinament_id','id');
    }

}
