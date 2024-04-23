<?php

namespace App\Models\Admin\Course;

use App\Models\Admin\Voucher\Vouchers;
use App\Models\Apps\Course\HistoryDownload;
use App\Models\Apps\Course\MyContentCheck;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Support\Str;

class Course extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'courses';
    protected $fillable = [
        'id', 'slug','active','see_value','title','nick','views','highlighted','meta_description',
        'large_description','value','meta_tags','link','youtube_link','image',
        'price_id','code','updated_by','created_by'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
        $this->attributes['slug']='atrator-cursos-'.Str::slug($value);
    }
    public function vouchers()
    {
        return $this->hasMany(Vouchers::class, 'course_id', 'id');
    }
    public function modules()
    {
        return $this->hasMany(Module::class,'course_id','id');
    }
    public function downloads()
    {
        return $this->hasMany(HistoryDownload::class,'course_id','id');
    }
    public function getConcludedModuleAttribute()
    {
        return MyContentCheck::where('module_id', $this->id)->get();
    }
    public function getConcludedContentAttribute()
    {
        return  MyContentCheck::where('content_id', $this->id)->get();
    }

    public function categories()
    {
        return $this->hasMany(CoursePivotCategory::class, 'courses_id','id');
    }
    public function category()
    {
        return $this->belongsTo(CoursePivotCategory::class,'id', 'courses_id');
    }

    public function packs()
    {
        return $this->hasMany(PackPivotCourse::class, 'courses_id','id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
