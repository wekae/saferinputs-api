<?php

namespace App\Providers;

use App\Models\Passport\AuthCode;
use App\Models\Passport\Client;
use App\Models\Passport\PersonalAccessClient;
use App\Models\Passport\Token;
use Carbon\Carbon;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
         'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::routes();

//        Passport::routes(function ($router) {
//            $router->forAuthorization();
//            $router->forAccessTokens();
//            $router->forTransientTokens();
//        });

        Passport::enableImplicitGrant();

//        Passport::withoutCookieSerialization();
        Passport::withCookieSerialization();

        Passport::$ignoreCsrfToken = true;

        Passport::tokensExpireIn(Carbon::now()->addDays(15));

        Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));

        Passport::personalAccessTokensExpireIn(Carbon::now()->addMonths(6));

        Passport::personalAccessClientId(
            config('passport.personal_access_client.id')
        );

        Passport::personalAccessClientSecret(
            config('passport.personal_access_client.secret')
        );

        Passport::useTokenModel(Token::class);

        Passport::useClientModel(Client::class);

        Passport::useAuthCodeModel(AuthCode::class);

        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }
}
