<?php

namespace App\Models\Admin\Essay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotSkillsEssays extends Model
{
    use HasFactory;

    protected $table = 'pivot_skills_essays';

    protected $fillable = [
        'id','skill_id','essay_id','active','points'
    ];

    public function skills()
    {
        return $this->belongsTo(Skill::class,'skill_id','id');
    }
    public function essay()
    {
        return $this->belongsTo(Essay::class);
    }
}
