<?php

namespace App\Models\Admin\Voucher;

use App\Models\Admin\Course\Course;
use App\Models\Admin\Essay\EssayUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

use App\Models\Admin\Voucher\Plans;
use App\Models\User;
use Carbon\Carbon;

class Vouchers extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'vouchers';

    protected $fillable = [
        'user_id', 'plan_id', 'active', 'code', 'updated_by', 'created_by', 'application','course_id', 'limit_access', 'send_date', 'send_email', 'sended_by'
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'limit_access' => 'datetime:Y-m-d H:i:s',
        'send_date' => 'datetime:Y-m-d H:i:s',
    ];
    public function setActiveAttribute($value)
    {
        if ($this->user_id) {
            $this->attributes['active']=$value;
            if ($value == 1) {
                $this->limit_access = date('Y-m-d H:i:s',
                strtotime('+'.$this->plan->qtd_days.' days',
                strtotime(date('Y-m-d H:i:s'))));
            }
        }

    }


    public function plan()
    {
        return $this->belongsTo(Plans::class, 'plan_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function getValityAttribute()
    {
        if ($this->limit_access != "") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $this->limit_access)
            ->format('d/m/Y');
        }
    }

    public function getAppAttribute()
    {
        switch ($this->application) {
            case 'questions':
                $convert = 'Questões';
                break;
            case 'treinament':
                $convert = 'Treinamento';
                break;
            case 'essay':
                $convert = 'Redação';
                break;
            case 'mentoring':
                $convert = 'Mentoria';
                break;
            case 'courses':
                if ($this->course) {
                    $convert = $this->course->title;
                }else{
                    $convert = 'Cancelado';
                }

                    break;
            default:
                $convert = '';
                break;
            }
            return mb_strtoupper($convert);
    }

    public function scopeFilterFields($query, $filters)
    {
        foreach ($filters as $key => $value) {

            if ($key == 'application') {

                switch ($value) {
                    case 'Questões':
                        $converted =  'questions';
                        break;
                    case 'Treinamento':
                        $converted =  'treinament';
                        break;
                    case 'Redação':
                        $converted =  'essay';
                        break;
                    case 'Mentoria':
                        $converted =  'mentoring';
                        break;

                    default:
                        $converted =  $value;
                        break;
                }
                return array('f' => 'LIKE', 'converted' => '%' . $converted . '%');
            }
            if ($key == 'limit_access') {

                if (substr_count($value, " ") === 1) {
                    $partesSpace = explode(" ", $value);
                    if (substr_count($partesSpace[0], "/") === 1) {
                        $partes = explode("/", $partesSpace[0]);
                        $converted = $partes[1] . "%-" . $partes[0] . "% " . $partesSpace[1];
                    } elseif (substr_count($partesSpace[0], "/") === 2) {
                        $partes = explode("/", $partesSpace[0]);
                        $converted = $partes[2] . "%-" . $partes[1] . "-" . $partes[0] . "% " . $partesSpace[1];
                    } else {
                        $converted = $value;
                    }
                } else {
                    if (substr_count($value, "/") === 1) {
                        $partes = explode("/", $value);
                        $converted = $partes[1] . "%-" . $partes[0];
                    } elseif (substr_count($value, "/") === 2) {
                        $partes = explode("/", $value);
                        $converted = $partes[2] . "%-" . $partes[1] . "-" . $partes[0];
                    } else {
                        $converted = $value;
                    }
                }
                return array('f' => 'LIKE', 'converted' => '%' . $converted . '%');
            }
        }
    }
}
