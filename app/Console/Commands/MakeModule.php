<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeModule extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}
                            {--model : Create a model}
                            {--controller : Create a controller}
                            {--seeder : Create a seeder}
                            {--factory : Create a factory}
                            {--observer : Create an observer}
                            {--notification : Create a notification}
                            {--event : Create an event}
                            {--listener : Create a listener}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module with optional components';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = ucfirst($this->argument('name'));
        // Always create a migration by default
        $this->createMigration($name);

        // Create model if the flag is provided
        if ($this->option('model')) {
            $this->createModel($name);
        }

        // Create controller if the flag is provided
        if ($this->option('controller')) {
            $this->createController($name);
        }

        // Create seeder if the flag is provided
        if ($this->option('seeder')) {
            $this->createSeeder($name);
        }

        // Create factory if the flag is provided
        if ($this->option('factory')) {
            $this->createFactory($name);
        }

        // Create observer if the flag is provided
        if ($this->option('observer')) {
            $this->createObserver($name);
        }

        // Create notification if the flag is provided
        if ($this->option('notification')) {
            $this->createNotification($name);
        }

        // Create event if the flag is provided
        if ($this->option('event')) {
            $this->createEvent($name);
        }

        // Create listener if the flag is provided
        if ($this->option('listener')) {
            $this->createListener($name);
        }
        $this->info("Module {$name} created successfully!");
        return 0;
    }
    protected function createMigration($name): void
    {
        $parts = preg_split('/(?=[A-Z])/', $name, -1, PREG_SPLIT_NO_EMPTY);
        $tableName = strtolower(implode('_', $parts));
        $lastPart = end($parts);
        if (!str_ends_with($lastPart, 's')) {
            $parts[count($parts) - 1] = Str::plural($lastPart);
            $tableName = strtolower(implode('_', $parts));
        }
        Artisan::call("make:migration create_{$tableName}_table --create={$tableName}");
        $this->info("Migration for {$name} created successfully!");
    }
    protected function createModel($name): void
    {
        Artisan::call("make:model {$name}");
        $this->info("Model {$name} created successfully!");
    }
    protected function createController($name): void
    {
        Artisan::call("make:controller {$name}Controller");
        $this->info("Controller {$name}Controller created successfully!");
    }
    protected function createSeeder($name): void
    {
        Artisan::call("make:seeder {$name}Seeder");
        $this->info("Seeder {$name}Seeder created successfully!");
    }
    protected function createFactory($name): void
    {
        Artisan::call("make:factory {$name}Factory");
        $this->info("Factory {$name}Factory created successfully!");
    }
    protected function createObserver($name): void
    {
        Artisan::call("make:observer {$name}Observer --model={$name}");
        $this->info("Observer {$name}Observer created successfully!");
    }
    protected function createNotification($name): void
    {
        Artisan::call("make:notification {$name}Notification");
        $this->info("Notification {$name}Notification created successfully!");
    }
    protected function createEvent($name): void
    {
        Artisan::call("make:event {$name}Event");
        $this->info("Event {$name}Event created successfully!");
    }
    protected function createListener($name): void
    {
        Artisan::call("make:listener {$name}Listener");
        $this->info("Listener {$name}Listener created successfully!");
    }
}
