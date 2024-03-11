<?php

namespace App\Models\Admin\Mentoring;

use App\Models\Apps\Mentoring\ContestQuestions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class ContestDiscipline extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'contest_disciplines';

    protected $fillable = [
        'id','title', 'nick', 'updated_by','created_by','active',
        'contest_id','slug','code','order'
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
        $this->attributes['slug']=Str::slug($value);
    }
    public function setNickAttribute($value)
    {
        $this->attributes['nick']=mb_strtoupper($value);
    }
    public function getTitleAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function getNickAttribute($value)
    {
        return mb_strtoupper($value);
    }
    public function contestMatter()
    {
        return $this->hasMany(ContestMatter::class);
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function getPerformancesAttribute()
    {
        $matters = $this->contestMatter;
        $performances = 0;
        $q=0;
        foreach ($matters as $matter) {

            $contestQuestions = ContestQuestions::where('contest_matter_id',$matter->id)->where('user_id',Auth::user()->id)->get();
            if ($contestQuestions->count() > 0) {
                $q +=1;
                $tot=0;
                $hits=0;
                foreach ($contestQuestions as $item) {
                    $tot += $item->qtd;
                    $hits += $item->hits;
                }
                $performance = ($hits * 100)/$tot;
                $performances += $performance;
            } else {
                $performance = '';
            }

        }
        if($q > 0){
            $performances = ($performances / $q);
            $performances = '<div class="badge badge-md"> Rendimento ' .number_format($performances, 2, ',', ' ').' (%)</div>';
        }else{
            $performances = '';
        }

        return $performances;
    }
    public function getPerformAttribute()
    {
        $matters = $this->contestMatter;
        $performances = 0;
        $q=0;
        foreach ($matters as $matter) {

            $contestQuestions = ContestQuestions::where('contest_matter_id',$matter->id)->where('user_id',Auth::user()->id)->get();
            if ($contestQuestions->count() > 0) {
                $q +=1;
                $tot=0;
                $hits=0;
                foreach ($contestQuestions as $item) {
                    $tot += $item->qtd;
                    $hits += $item->hits;
                }
                $performance = ($hits * 100)/$tot;
                $performances += $performance;
            } else {
                $performance = '';
            }

        }
        if($q > 0){
            $performances = ($performances / $q);
            $performances = number_format($performances, 1, '.', ' ');
        }else{
            $performances = '';
        }

        return $performances;
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
}
