<?php

namespace App\Events;

use Exception;
use Illuminate\Foundation\Events\Dispatchable;

class SendPostFailure
{
    use Dispatchable;

    /**
     * The post request's response exception.
     *
     * @var Exception
     */
    public $exception;

    /**
     * Create a new event instance.
     *
     * @param Exception $exception
     * @return void
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }
}
