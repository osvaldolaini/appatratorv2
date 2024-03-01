<?php

namespace App\Models\Admin\Mentoring;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Contest extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contests';

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
        $this->attributes['slug']=Str::slug($value);
    }
    public function setNickAttribute($value)
    {
        $this->attributes['nick']=mb_strtoupper($value);
    }
    protected $fillable = [
        'id','title','id','day','slug','nick','examining_board','updated_by','created_by','active','code'
    ];

    protected $casts = [
        'day' => 'datetime:Y-m-d',
    ];

    public function discipline()
    {
        return $this->hasMany(ContestDiscipline::class,'contest_id','id');
    }
    public function getTitleAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function getNickAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function setDayAttribute($value)
    {
        if ($value != "") {
            $this->attributes['day'] = implode("-", array_reverse(explode("/", $value)));
        } else {
            $this->attributes['day'] = NULL;
        }
    }
    public function getDayAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('d/m/Y');
        }
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
