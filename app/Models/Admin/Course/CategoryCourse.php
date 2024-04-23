<?php

namespace App\Models\Admin\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class CategoryCourse extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'category_courses';

    public function pivotCourses()
    {
        return $this->hasMany(CoursePivotCategory::class, 'category_courses_id','id');
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
        $this->attributes['slug']=Str::slug($value);
    }
    protected $fillable = [
        'id', 'active', 'title','nick','acronym',
        'master','deleted_by', 'created_by','master'
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
