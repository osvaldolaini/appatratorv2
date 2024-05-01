<?php

namespace App\Models\Admin\Voucher;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Essay\EssayUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use App\Models\Admin\Voucher\Plans;
use App\Models\User;
use Carbon\Carbon;

class Package extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'packages';

    protected $fillable = [
       'id', 'pack_pivot_course_id', 'application', 'active', 'code',
       'updated_by', 'created_by','course_id','plan_id','pack_pivot_app_id'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function plan()
    {
        return $this->belongsTo(Plans::class, 'plan_id', 'id');
    }


}

