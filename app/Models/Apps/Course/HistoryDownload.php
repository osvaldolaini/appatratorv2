<?php

namespace App\Models\Apps\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class HistoryDownload extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'history_downloads';

    protected $fillable = [
        'id','path','user_id','content_id','module_id','course_id'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }

}
