<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('profile-user', function (User $user) {
            if ($user->group == null) {
                redirect()->route('dashboard');
            }
        });
        Gate::define('contest-user', function (User $user) {
            if ($user->contest == null) {
                redirect()->route('apps.contest.user');
            }
        });
    }
}
