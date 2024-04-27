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
        'id','exercise_id','repeat','time','distance','season_treinament_id'
    ];
    protected $casts = [
        'time' => 'datetime:H:i:s',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
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
                ->format('i:s');
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
