<?php


namespace App\Auth\Providers;

use League\OAuth2\Server\AuthorizationServer;

/**
 * Class PassportServiceProvider
 * @package App\Auth\Providers
 * This is where we override the PassportServiceProvider.
 */
class PassportServiceProvider extends \Laravel\Passport\PassportServiceProvider
{
    public function makeAuthorizationServer()
    {
        return new AuthorizationServer(
            $this->app->make(\Laravel\Passport\Bridge\ClientRepository::class),
            $this->app->make(\App\Auth\Repository\AccessTokenRepository::class),
            $this->app->make(\Laravel\Passport\Bridge\ScopeRepository::class),
            $this->makeCryptKey('private'),
            app('encrypter')->getKey()
        );
    }

}
