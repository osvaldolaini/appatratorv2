<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\Questions\Responses;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\Apps\Mentoring\ContestPlanningCyclesUser;
use App\Models\Apps\Mentoring\ContestPlanningUser;
use App\Models\Apps\Mentoring\ContestUser;
use App\Models\Apps\Treinament\Season;
use App\Services\PaymentGateway\Connectors\AsaasConnector;
use App\Services\PaymentGateway\Gateway;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'group',
        'nick',
        'cpfCnpj',
        'mobilePhone',
        'asaas_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getCreatedAttribute()
    {
        $this->attributes['group']='user';

        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d/m/Y H:i:s');
    }

    public function createOrGetAsaasCustomer()
    {
            $adapter = new AsaasConnector();
            $gateway = new Gateway($adapter);

            $data = [
                'name' => $this->name,
                'cpfCnpj' => $this->cpfCnpj,
                'email' => $this->email,
                'mobilePhone' => $this->mobilePhone,
                'id' => $this->asaas_id
            ];
            // if (!isset($this->asaas_id)) {
                $customer = $gateway->customer()->create($data);
                // dd($customer);
                $this->asaas_id = $customer['id'];
                $this->save();
            // }
            return json_encode($customer);
    }

    public function getUpdatedAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)
            ->format('d/m/Y H:i:s');
    }

    public function responses(): HasMany
    {
        return $this->hasMany(Responses::class);
    }

    public function vouchers(): HasMany
    {
        return $this->hasMany(Vouchers::class);
    }

    public function contest(): HasOne
    {
        return $this->hasOne(ContestUser::class,'user_id','id');
    }

    public function planning(): HasMany
    {
        return $this->HasMany(ContestPlanningUser::class,'user_id','id');
    }
    public function cycle(): HasMany
    {
        return $this->HasMany(ContestPlanningCyclesUser::class,'user_id','id');
    }

    public function seasons(): HasMany
    {
        return $this->HasMany(Season::class,'user_id','id');
    }

}
