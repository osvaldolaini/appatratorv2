<?php

namespace App\Models\Apps\Course;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class MyContentCheck extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'my_content_checks';

    protected $fillable = [
        'id','user_id','content_id','module_id'
    ];

    public function content():BelongsTo
    {
        return $this->belongsTo(MyContent::class);
    }
    public function check()
    {
        $check = MyContentCheck::where('content_id', $this->id)->where('user_id', Auth::user()->id)->first();
        if (isset($check)) {
            return true;
        } else {
            return false;
        }
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
