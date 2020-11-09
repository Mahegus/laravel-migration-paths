<?php

namespace matt127127\MigrationPath;

use matt127127\MigrationPath\Console\Migration\MigrateCommand;

class MigrationServiceProvider extends \Illuminate\Database\MigrationServiceProvider
{
    public function register()
    {
        parent::register();

        $this->registerMigrateCommand();
    }

    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.migrate', function($app) {
            return new MigrateCommand($app['migrator'], $app['dispatcher']);
        });
    }
}
