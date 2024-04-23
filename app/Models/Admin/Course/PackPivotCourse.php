<?php

namespace App\Models\Admin\Course;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PackPivotCourse extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'pack_pivot_courses';
    protected $fillable = [
        'id','active','title','order','highlighted','description','see_value',
        'price_id','value','qtd_parcel','link_hotmart','value_parcel','updated_by','created_by',
        'courses_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id','id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
