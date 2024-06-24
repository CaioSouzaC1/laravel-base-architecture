<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class RunTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pest:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Pest tests';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Running Pest tests...');
        $pest = Process::fromShellCommandline('./vendor/bin/pest');
        $pest->run();
        $this->info($pest->getOutput());
    }
}
