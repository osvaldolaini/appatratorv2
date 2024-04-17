<?php

namespace App\Models\Apps\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MyCourse extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'courses';

    public function modules()
    {
        return $this->hasMany(MyModule::class, 'course_id', 'id');
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
    public function getProgressAttribute()
    {
        $allcontents = 0;
        $allvalue = 0;

        if ($this->modules) {
            foreach ($this->modules as $module) {
                $contents = $module->contents->where('active', 1)->where('type', 1)->count();
                $value = MyContentCheck::where('module_id', $module->id)
                        ->where('user_id', Auth::user()->id)->get()->count();
                if ($contents) {
                    $allcontents += $contents;
                    $allvalue += $value;
                }
            }
        }
        return array('max' => $allcontents, 'value' =>  $allvalue);
    }
}
