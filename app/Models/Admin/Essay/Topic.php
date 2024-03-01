<?php

namespace App\Models\Admin\Essay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class Topic extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'topics';

    protected $fillable = [
        'id','title','base','proposal','updated_by','created_by','active','code','essay_id'
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
    }

    public function essay()
    {
        return $this->belongsTo(Essay::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
