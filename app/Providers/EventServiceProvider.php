<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Listeners\LogSuccessfulLogin;

// Importeer de listener
use Illuminate\Auth\Events\Login;

// Importeer het event

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Login::class => [ // Luister naar het Login event
            LogSuccessfulLogin::class, // Roep de LogSuccessfulLogin listener aan
        ],
        // Hier kun je andere events en hun listeners toevoegen
    ];

    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
