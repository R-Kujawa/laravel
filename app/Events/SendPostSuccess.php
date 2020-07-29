<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\Client\Response;

class SendPostSuccess
{
    use Dispatchable;

    /**
     * The post request's response.
     *
     * @var \Illuminate\Http\Client\Response
     */
    public $response;

    /**
     * Create a new event instance.
     *
     * @param \Illuminate\Http\Client\Response $response
     * @return void
     */
    public function __construct(Response $response)
    {
        $this->response = $response;
    }
}
