<?php

namespace App\Models\Apps\Mentoring;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestEssays extends Model
{
    use HasFactory;

    protected $table = 'contest_essays';

    protected $fillable = [
        'id','user_id','code','full_mark','mark','day','contest_user_id',
        'updated_by','created_by'
    ];
    protected $casts = [
        'day' => 'datetime:Y-m-d H:i:s',
    ];
    public function setDayAttribute($value)
    {
        if ($value != "") {
            $this->attributes['day'] = implode("-", array_reverse(explode("/", $value)));
        } else {
            $this->attributes['day'] = NULL;
        }
    }
    public function getDayAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('d/m/Y');
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function contestUser()
    {
        return $this->belongsTo(ContestUser::class,'contest_user_id','id');
    }
    public function dayMonth()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->day)
                ->format('d/m');
    }
}
