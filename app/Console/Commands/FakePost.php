<?php

namespace App\Console\Commands;

use App\Jobs\SendPost;
use Illuminate\Console\Command;

class FakePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fake:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a fake post request.';

    /**
     * The fake url to send post request to.
     *
     * @var string
     */
    const FAKE_URL = 'https://atomic.incfile.com/fakepost';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        SendPost::dispatch(self::FAKE_URL);

        $this->info('The fake post request was added to the queue.');
    }
}
