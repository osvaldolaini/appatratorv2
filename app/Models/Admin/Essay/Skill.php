<?php

namespace App\Models\Admin\Essay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = [
        'id','title','updated_by','created_by','active','code'
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
    }
    public function pivot()
    {
        return $this->hasMany(PivotSkillsEssays::class);
    }
}
