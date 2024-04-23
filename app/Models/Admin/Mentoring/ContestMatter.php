<?php

namespace App\Models\Admin\Mentoring;

use App\Models\Apps\Mentoring\ContestQuestions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ContestMatter extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contest_matters';
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
        $this->attributes['slug']=Str::slug($value);
    }
    public function setNickAttribute($value)
    {
        $this->attributes['nick']=mb_strtoupper($value);
    }
    protected $fillable = [
        'id','title', 'nick','level' ,'updated_by','created_by','active','order','order_title',
        'contest_discipline_id','code','slug'
    ];

    public function discipline()
    {
        return $this->belongsTo(ContestDiscipline::class);
    }
    public function getPerformanceAttribute()
    {
        $contestQuestions = ContestQuestions::where('contest_matter_id',$this->id)
        ->where('user_id',Auth::user()->id)
        ->get();
        if ($contestQuestions->count() > 0) {
            $tot=0;
            $hits=0;
            foreach ($contestQuestions as $item) {
                $tot += $item->qtd;
                $hits += $item->hits;
            }
            $performance = ($hits * 100)/$tot;
            $performance = number_format($performance, 2, ',', ' ');
        } else {
            $performance = '';
        }
        return $performance;
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function getOrderLevelAttribute()
    {
        $lv = explode('.',$this->order_title);

        return count($lv);
    }
    public function level()
    {
        switch ($this->level) {
            case 1: return 'badge-info'; break;
            case 2: return 'badge-success'; break;
            case 3: return 'badge-warning'; break;
            case 4: return 'badge-secondary'; break;
            case 5: return 'badge-error'; break;
            default:  return ''; break;
        }
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }

}
