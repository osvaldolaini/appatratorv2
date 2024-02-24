<?php

namespace App\Models\Admin\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Questions\Questions;
use App\Models\Admin\Questions\Alternatives;
use App\Models\User;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Responses extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'responses';

    protected $fillable = [
        'alternative_id','question_id','user_id','code'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }


    public function question()
    {
        return $this->belongsTo(Questions::class,'question_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function alternatives()
    {
        return $this->belongsTo(Alternatives::class,'alternative_id','id');
    }
}
