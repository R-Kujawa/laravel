<?php

namespace App\Listeners;

use App\Events\SendPostSuccess;
use Illuminate\Support\Facades\Log;

class SendPostSuccessNotification
{
    /**
     * Handle the event.
     *
     * @param  \App\Events\SendPostSuccess  $event
     * @return void
     */
    public function handle(SendPostSuccess $event)
    {
        Log::channel('activity')->info('A post request was sent successfully! ' . $event->response->status());
    }
}
