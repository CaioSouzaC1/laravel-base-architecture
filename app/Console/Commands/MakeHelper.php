<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeHelper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:helper {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new helper class';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $namespace = 'App\Helpers\Requests';
        $parts = explode('/', $name);
        $className = array_pop($parts);
        $directory = implode('/', $parts);
        $path = app_path("Helpers/Requests/{$directory}/{$className}.php");

        // Ensure the directory exists
        if (!File::isDirectory(dirname($path))) {
            File::makeDirectory(dirname($path), 0755, true);
        }

        // Adjust namespace
        if (!empty($directory)) {
            $namespace .= '\\' . str_replace('/', '\\', $directory);
        }

        // Generate the helper class content
        $content = "<?php

namespace {$namespace};

class {$className}
{
    /**
     * Get the validation rules for the admin ID.
     *
     * @return array The validation rules.
     */
    public static function rule(): array
    {
        // Add validation rules here
        return [];
    }

    /**
     * Get the attributes for the validation rule.
     *
     * @return array
     */
    public static function attributes(): array
    {
        // Add attributes here
        return [];
    }
}
";

        // Create the file
        if (File::put($path, $content) !== false) {
            $this->info("Helper {$name} created successfully.");
        } else {
            $this->error("Failed to create helper {$name}.");
        }

        return 0;
    }
}


