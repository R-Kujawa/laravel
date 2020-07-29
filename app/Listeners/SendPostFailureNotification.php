<?php

namespace App\Listeners;

use App\Events\SendPostFailure;
use Illuminate\Support\Facades\Log;

class SendPostFailureNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SendPostFailure $event)
    {
        Log::channel('error')->critical('A post request failed to respond correctly: ' . $event->exception->getMessage());

        // You can also send custom notification here to notify a team directly in order to take action.
    }
}
