<?php

namespace App\Models\Admin\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Module extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'modules';
    protected $fillable = [
        'id','active','title','type','order','description','course_id',
        'image_path','code','updated_by','created_by'
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
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function contents()
    {
        return $this->hasMany(ModuleContent::class,'module_id','id');
    }
}
