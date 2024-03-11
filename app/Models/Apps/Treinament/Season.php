<?php

namespace App\Models\Apps\Treinament;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Season extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'seasons';

    protected $fillable = [
        'id','title','updated_by','created_by','status','code','limit_date','year','user_id'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'limit_date' => 'datetime:Y-m-d',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
    public function setLimitDateAttribute($value)
    {
        if ($value != "") {
            $this->attributes['limit_date'] = implode("-", array_reverse(explode("/", $value)));
        } else {
            $this->attributes['limit_date'] = NULL;
        }
    }
    public function getLimitDateAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d', $value)
                ->format('d/m/Y');
        }
    }
    public function getLimitAttribute()
    {
        return implode("-", array_reverse(explode("/", $this->limit_date)));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
