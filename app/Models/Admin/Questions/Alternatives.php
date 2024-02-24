<?php

namespace App\Models\Admin\Questions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Questions\Questions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Alternatives extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'alternatives';

    protected $fillable = [
        'text', 'correct', 'status','question_id','qtd_clicks','code'
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
    public function responses()
    {
        return $this->hasMany(Responses::class,'alternative_id','id');
    }
}
