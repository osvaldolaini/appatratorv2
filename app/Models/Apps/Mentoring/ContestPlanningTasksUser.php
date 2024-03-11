<?php

namespace App\Models\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestMatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContestPlanningTasksUser extends Model
{
    use HasFactory;

    protected $table = 'contest_planning_tasks_users';

    protected $fillable = [
        'id','user_id','contest_matter_id','contest_planning_daily_id',
        'created_by','code'
    ];
    public function matter(): BelongsTo
    {
        return $this->BelongsTo(ContestMatter::class,'contest_matter_id','id');
    }
}
