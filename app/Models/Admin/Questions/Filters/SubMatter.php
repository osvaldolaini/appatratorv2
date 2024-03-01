<?php

namespace App\Models\Admin\Questions\Filters;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class SubMatter extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'sub_matters';
    /* set--Nomedainput--Attribute
     respeitando o case-sensitive
    */
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
        $this->attributes['slug']=Str::slug($value);
    }

    protected $fillable = [
        'id','title', 'nick', 'slug','updated_by','created_by','active','order','matter_id','code'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }


    public function matter(): BelongsTo
    {
        return $this->belongsTo(Matter::class);
    }
}
