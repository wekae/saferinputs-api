<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
//        'Laravel\Passport\Events\AccessTokenCreated' => [
//            'App\Listeners\RevokeOldTokens',
//        ],
//
//        'Laravel\Passport\Events\RefreshTokenCreated' => [
//            'App\Listeners\PruneOldTokens',
//        ],
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\MediaUpdated' => [
            'App\Listeners\UpdatePostToken',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
