<?php

namespace App\Models\Apps\Treinament;

use App\Models\Admin\Treinament\Exercise;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Training extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'trainings';

    protected $fillable = [
        'id', 'exercise_id', 'day','repeat', 'time', 'distance', 'season_treinament_id'
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
        } else {
            $this->attributes['day'] = NULL;
        }
    }

    public function setTimeAttribute($value)
    {
        if ($value != "") {
            $this->attributes['time'] = '00:' . $value;
        } else {
            $this->attributes['time'] = NULL;
        }
    }
    public function getTimeAttribute($value)
    {
        if ($value) {
            return Carbon::createFromFormat('H:i:s', $value)
                ->format('H:i:s');
        }
    }
    public function getTimeChartAttribute()
    {
        if ($this->time) {

            $tempo = $this->time;
            $tempo_em_segundos = strtotime($tempo) - strtotime('TODAY');
            $tempo_em_minutos = $tempo_em_segundos / 60;

            $tempo_em_minutos_formatado = number_format($tempo_em_minutos, 2);
            return $tempo_em_minutos_formatado;
        }
    }


    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
    public function seasonTreinament()
    {
        return $this->belongsTo(SeasonTreinament::class);
    }
}
