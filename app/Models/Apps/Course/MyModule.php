<?php

namespace App\Models\Apps\Course;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Course\ModuleContent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MyModule extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'modules';
    protected $fillable = [
        'id','active','title','type','order','description','course_id',
        'image','code','updated_by','created_by'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    public function contents()
    {
        return $this->hasMany(MyContent::class,'module_id','id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
    public function getRouteKeyName(): string
    {
        return 'code';
    }
    public function getImageAttribute()
    {
        if (Storage::exists('public/modules/' . $this->id.'/thumb')) {
            return true;
        } else {
            return false;
        }
    }
    public function getFullAttribute()
    {
        $contents = $this->contents->where('active',1)->where('type',1)->count();
        $full = MyContentCheck::where('module_id',$this->id)->where('user_id',Auth::user()->id)->get()->count();

        if ($full >= $contents) {
            return true;
        } else {
            return false;
        }
    }
    public function getProgressAttribute()
    {
        $contents = $this->contents->where('active',1)->where('type',1);
        $value = MyContentCheck::where('module_id',$this->id)->where('user_id',Auth::user()->id)->get()->count();
        if($contents == null){
            $contents = 0;
            $value = 0;
        }
        // dd($contents->count());

        return array('max'=>$contents->count(),'value'=>$value);
    }

}
