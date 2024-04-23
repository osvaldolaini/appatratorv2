<?php

namespace App\Models\Admin\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;


class CoursePivotCategory extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'course_pivot_categories';

    protected $fillable = [
        'id', 'courses_id', 'category_courses_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id','id');
    }
    public function category()
    {
        return $this->belongsTo(CategoryCourse::class, 'category_courses_id','id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
