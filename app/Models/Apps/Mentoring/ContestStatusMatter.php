<?php

namespace App\Models\Apps\Mentoring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestStatusMatter extends Model
{
    use HasFactory;

    protected $table = 'contest_status_matters';

    protected $fillable = [
        'id','contest_matter_id','user_id','code','contest_user_id','created_by'
    ];

}

