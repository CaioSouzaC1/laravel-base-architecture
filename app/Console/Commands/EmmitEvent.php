<?php

namespace App\Console\Commands;

use App\Events\TestingReverb;
use Illuminate\Console\Command;

class EmmitEvent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        TestingReverb::dispatch();
    }
}
