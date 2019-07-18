<?php

namespace App\Providers;
use App\User;
use App\Policies\UserPolicy;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes(function($router){
         $router->forAccessTokens();
        });
        $this->commands([
                    \Laravel\Passport\Console\InstallCommand::class,
                    \Laravel\Passport\Console\ClientCommand::class,
                    \Laravel\Passport\Console\KeysCommand::class,
                ]);
        Passport::tokensExpireIn(now()->addHours(12));

        Passport::refreshTokensExpireIn(now()->addDays(5));

        Passport::personalAccessTokensExpireIn(now()->addMonths(5));
    }
}
