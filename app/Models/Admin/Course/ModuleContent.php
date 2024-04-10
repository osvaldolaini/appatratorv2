<?php

namespace App\Models\Admin\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ModuleContent extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'module_contents';
    protected $fillable = [
        'id','active','title','type','youtube_link','type_content','order','description','module_id','code','updated_by','created_by'
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
    public function module()
    {
        return $this->belongsTo(Module::class,'module_id','id');
    }
}
