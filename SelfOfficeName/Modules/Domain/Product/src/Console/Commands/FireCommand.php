<?php

namespace Selfofficename\Modules\Domain\Product\Console\Commands;

use Illuminate\Console\Command;
use Selfofficename\Modules\Domain\Product\Jobs\Testjob;

class FireCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fire';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Testjob::dispatch();
    }
}
