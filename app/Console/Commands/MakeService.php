<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $namespace = 'App\Services';

        $parts = explode('/', $name);
        $className = array_pop($parts);

        $classNameWithService = str_contains($className, 'Service') ? $className : "{$className}Service";

        $directory = implode('/', $parts);

        $path = app_path("Services/{$directory}/{$classNameWithService}.php");

        // Ensure the directory exists
        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        // Adjust namespace
        if (!empty($directory)) {
            $namespace .= '\\' . str_replace('/', '\\', $directory);
        }

        // Generate the service class content
        $content = "<?php

namespace {$namespace};

class {$classNameWithService}
{

}";

        // Write the service class to the file
        File::put($path, $content);

        $this->info("Service created successfully.");
    }
}

