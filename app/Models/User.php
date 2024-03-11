<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Admin\Questions\Responses;
use App\Models\Admin\Voucher\Vouchers;
use App\Models\Apps\Mentoring\ContestPlanningCyclesUser;
use App\Models\Apps\Mentoring\ContestPlanningUser;
use App\Models\Apps\Mentoring\ContestUser;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_groups_id',
        'nick',
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
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)
            ->format('d/m/Y H:i:s');
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

}
