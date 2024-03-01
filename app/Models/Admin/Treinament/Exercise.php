<?php

namespace App\Models\Admin\Treinament;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Exercise extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'exercises';

    protected $fillable = [
        'id','title','updated_by','created_by','active','code','unity','user_id'
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
