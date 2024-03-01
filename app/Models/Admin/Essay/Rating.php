<?php

namespace App\Models\Admin\Essay;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = 'ratings';

    protected $fillable = [
        'id','user_id','essay_user_id','pivot_skills_essay_id','points'
    ];

    public function userEssay()
    {
        return $this->belongsTo(EssayUser::class);
    }
    public function pivotEssay()
    {
        return $this->belongsTo(PivotSkillsEssays::class,'pivot_skills_essay_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
