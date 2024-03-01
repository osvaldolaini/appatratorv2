<?php

namespace App\Models\Apps\Essay;

use App\Models\Admin\Essay\Essay;
use App\Models\Admin\Essay\Rating;
use App\Models\Admin\Essay\Topic;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EssayUser extends Model
{
    use HasFactory;

    protected $table = 'essay_users';

    protected $fillable = [
        'id','user_id','performed_at','status','code','essay_id','send_at','voucher_id','topic_id','upload_rating_at'
    ];
    protected $casts = [
        'performed_at' => 'datetime:Y-m-d H:i:s',
        'send_at' => 'datetime:Y-m-d H:i:s',
        'upload_rating_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function setPerformedAtAttribute($value)
    {
        if ($value != "") {
            $this->attributes['performed_at'] = implode("-", array_reverse(explode("/", $value)));
        } else {
            $this->attributes['performed_at'] = NULL;
        }
    }
    public function getPerformedAtAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('d/m/Y');
        }
    }
    public function setSendAtAttribute($value)
    {
        if ($value != "") {
            $this->attributes['send_at'] = implode("-", array_reverse(explode("/", $value)));
        } else {
            $this->attributes['send_at'] = NULL;
        }
    }
    public function getSendAtAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('d/m/Y');
        }
    }
    public function setUploadRatingAtAttribute($value)
    {
        if ($value != "") {
            $this->attributes['upload_rating_at'] = implode("-", array_reverse(explode("/", $value)));
        } else {
            $this->attributes['upload_rating_at'] = NULL;
        }
    }
    public function getUploadRatingAtAttribute($value)
    {
        if ($value != "") {
            return Carbon::createFromFormat('Y-m-d H:i:s', $value)
                ->format('d/m/Y');
        }
    }

    public function essay()
    {
        return $this->belongsTo(Essay::class);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class,'essay_user_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function voucher()
    {
        return $this->belongsTo(Vouchers::class);
    }
    public function topics()
    {
        return $this->belongsTo(Topic::class,'topic_id','id');
    }

    public function getStatusAdminAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Excluido';
                break;
            case 1:
                return 'Não enviado';
                break;
            case 2:
                return 'Corrigir';
                break;
            case 3:
                return 'Corrigida';
                break;

            default:
                return 'Não enviado';
                break;
        }
    }
    public function getStatuUserAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Excluido';
                break;
            case 1:
                return 'Não enviado';
                break;
            case 2:
                return 'Corrigindo...';
                break;
            case 3:
                return 'Corrigida';
                break;

            default:
                return 'Não enviado';
                break;
        }
    }

}
