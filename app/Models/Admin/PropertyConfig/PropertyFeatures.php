<?php

namespace App\Models\Admin\PropertyConfig;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
class PropertyFeatures extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'property_features';

    protected $fillable = [
        'active', 'title', 'category','slug','updated_by', 'created_by'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = mb_strtoupper($value);
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
        // Chain fluent methods for configuration options
    }
}
