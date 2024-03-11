<?php

namespace App\Models\Apps\Mentoring;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestControllerCycleUser extends Model
{
    use HasFactory;

    protected $table = 'contest_controller_cycle_users';

    protected $fillable = [
        'id','user_id','status','planning_cycle_id','created_by'
    ];

    public function status()
    {
        switch ($this->status) {
            case 0: return 'bg-red-400'; break;
            case 1: return 'bg-green-400'; break;
        }
    }
    public function cycle()
    {
        return $this->belongsTo(ContestPlanningCyclesUser::class,'planning_cycle_id','id');
    }
}
