<?php
namespace matt127127\MigrationPath;


use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole())
        {
            $this->publishes([
                __DIR__ . '/../config/laravel-migration-paths.php' => config_path('laravel-migration-paths.php'),
            ], 'config');
        }
    }

    public function register()
    {
        if ( $this->app->runningInConsole() )
        {
            $this->mergeConfigFrom(
                __DIR__ . '/../config/laravel-migration-paths.php',
                'laravel-migration-paths'
            );

            $multipleMigrationPaths = new MultipleMigrationPaths(config('laravel-migration-paths'));
            $this->loadMigrationsFrom($multipleMigrationPaths->getRegisteredPaths());

        }
    }
}
