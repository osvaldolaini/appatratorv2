<?php

namespace App\Models\Admin\Essay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Essay extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'essays';

    protected $fillable = [
        'id','title','examining_board','updated_by','created_by','active','code'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }

    public function essay()
    {
        return $this->hasMany(PivotSkillsEssays::class);
    }
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
