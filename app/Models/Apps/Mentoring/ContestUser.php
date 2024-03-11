<?php

namespace App\Models\Apps\Mentoring;

use App\Models\Admin\Mentoring\Contest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ContestUser extends Model
{
    use HasFactory;

    protected $table = 'contest_users';

    protected $fillable = [
        'id','contest_id','user_id','code','cycles','qtd_cycles', 'updated_by','created_by'
    ];

    public function contest()
    {
        return $this->belongsTo(Contest::class,'contest_id','id');
    }
    public function myCycle(): HasMany
    {
        return $this->hasMany(ContestPlanningCyclesUser::class);
    }
    public function reviews($matter_id,$contest_user_id)
    {
        return ContestReviews::where('contest_matter_id',$matter_id)
        ->where('contest_user_id',$contest_user_id)
        ->orderBy('day','desc')
        ->get();
    }

    public function questions()
    {
        $questions = ContestQuestions::where('contest_user_id',$this->id)
        ->get();
        $qtds=0;
        $hits=0;
        $errors=0;
        foreach ($questions as $question) {
            $qtds += $question->qtd;
            $hits += $question->hits;
            $errors += $question->qtd - $question->hits;
        }
        return ['qtds'=> $qtds,
            'hits' => $hits,
            'errors' => $errors
        ];
    }
    public function simulated(): HasMany
    {
        return $this->hasMany(ContestSimulated::class);
    }
    public function essays(): HasMany
    {
        return $this->hasMany(ContestEssays::class);
    }

    public function statusMatter($matter_id,$contest_user_id)
    {
        $status = ContestStatusMatter::where('contest_matter_id',$matter_id)
        ->where('contest_user_id',$contest_user_id)
        ->first();

        return ($status ? $status->id : false);
    }

    public function progress($disciplines = null)
    {
        if($disciplines == null){
            $disciplines = $this->contest->discipline;
            $allmatters = 0;
            foreach ($disciplines as $key) {
                $allmatters += $key->contestMatter->count();
            }
            $status = ContestStatusMatter::where('contest_user_id',$this->id)
            ->get()->count();
        }else{
            $allmatters = $disciplines->contestMatter->count();
            $status = 0;
            foreach ($disciplines->contestMatter as $key) {
                $status += ContestStatusMatter::where('contest_user_id',$this->id)
                ->where('contest_matter_id',$key->id)
                ->get()->count();
            }
        }

        $progress = array('max'=>$allmatters,'value'=>$status);
        return $progress;
    }


}
