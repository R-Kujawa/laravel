<?php

namespace App\Jobs;

use App\Events\SendPostFailure;
use App\Events\SendPostSuccess;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;

class SendPost implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3; // This will handle question 4.

    /**
     * The number of seconds to wait before retrying the job.
     *
     * @var int
     */
    public $retryAfter = 10;

    /**
     * The url to send post request to.
     *
     * @var string
     */
    protected $url;

    /**
     * The data to send with the post request.
     *
     * @var string
     */
    protected $data;

    /**
     * Create a new job instance.
     *
     * @param string $url
     * @param array $data
     * @return void
     */
    public function __construct(string $url, array $data = [])
    {
        $this->url = $url;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Http::fake(); /* Uncomment to always return 200 status code */
        $response = Http::post($this->url, $this->data)->throw();

        if ($response->successful()) {
            event(new SendPostSuccess($response));
        } else {
            throw(new Exception('An unexpected error occured sending a post request to ' . $this->url . '.'));
        }
    }

    /**
     * Handle a job failure.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(Exception $exception)
    {
        event(new SendPostFailure($exception)); // This will handle question 5. (The queue will allow us to process all requests, the event will allow us to notify someone about this error.)
    }
}
