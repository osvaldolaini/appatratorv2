<?php

namespace App\Models\Admin\Voucher;

use App\Models\Admin\Voucher\Package;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class PackPivotApp extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'pack_pivot_apps';
    protected $fillable = [
        'id','active','title','order','description','see_value','application',
        'price_id','value','qtd_parcel','link_hotmart','value_parcel','updated_by','created_by',

    ];

    // public function packageCourse()
    // {
    //     return $this->hasMany(Package::class,'pack_pivot_course_id','id');
    // }
    public function package()
    {
        return $this->hasMany(Package::class,'pack_pivot_app_id','id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
