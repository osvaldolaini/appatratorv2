<?php

namespace App\Models\Admin\Questions\Filters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ExaminingBoard extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'examining_boards';
    /* set--Nomedainput--Attribute
     respeitando o case-sensitive
    */
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug']=Str::slug($value);
    }

    protected $fillable = [
        'title', 'nick', 'slug','updated_by','created_by','active','code'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
