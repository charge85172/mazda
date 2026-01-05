<?php

namespace App\Listeners;

use App\Models\LoginRecord;

// Import the LoginRecord model
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        // Log the login event for the user
        LoginRecord::create([
            'user_id' => $event->user->id,
            'logged_in_at' => now(),
        ]);
    }
}
