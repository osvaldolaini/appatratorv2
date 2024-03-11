<?php

namespace App\Models\Apps\Treinament;

use App\Models\Admin\Treinament\Exercise;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SeasonExercise extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'season_exercises';

    protected $fillable = [
        'id','user_id','season_id','exercise_id','repeat','time','distance','status'
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
            $this->attributes['time'] = '00:'.$value;
        } else {
            $this->attributes['time'] = NULL;
        }
    }
    public function getTimeAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s', $value)
                    ->format('i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function season()
    {
        return $this->belongsTo(Season::class);
    }
    public function exercise()
    {
        return $this->belongsTo(Exercise::class);
    }
}
