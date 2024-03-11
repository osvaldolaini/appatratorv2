<?php

namespace App\Models\Apps\Mentoring;

use App\Models\Admin\Mentoring\ContestMatter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContestReviews extends Model
{
    use HasFactory;

    protected $table = 'contest_reviews';

    protected $fillable = [
        'id','contest_matter_id','user_id','code','day','contest_user_id',
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

    public function matter()
    {
        return $this->belongsTo(ContestMatter::class,'contest_matter_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function contestUser()
    {
        return $this->belongsTo(ContestUser::class,'contest_user_id','id');
    }



}
