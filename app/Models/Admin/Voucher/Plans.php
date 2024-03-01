<?php

namespace App\Models\Admin\Voucher;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Plans extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'plans';

    protected $fillable = [
        'title', 'unity', 'active','qtd','qtd_days','code','updated_by','created_by',
    ];
    public function setTitleAttribute($value)
    {
        $this->attributes['title']=mb_strtoupper($value);
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly($this->fillable);
    }
    public function setQtdAttribute($value)
    {
        $this->attributes['qtd']=mb_strtoupper($value);
        switch ($this->unity) {
            case 'Mês':
                $this->qtd_days = $this->qtd * 30;
                break;
            case 'Ano':
                $this->qtd_days = $this->qtd * 365;
                break;
            case 'Dia':
                $this->qtd_days = $this->qtd;
                break;

            default:
                $this->qtd_days = $this->qtd;
                break;
        }
        $this->attributes['qtd_days']=$this->qtd_days;
    }
    //Planos
    public function calc_days($uniy,$q)
    {
        switch ($uniy) {
            case 'Mês':
                $this->qtd_days = $q * 30;
                break;
            case 'Ano':
                $this->qtd_days = $q * 365;
                break;
            case 'Dia':
                $this->qtd_days = $q;
                break;

            default:
                $this->qtd_days = $q;
                break;
            return $this->qtd_days;
        }
    }

};
