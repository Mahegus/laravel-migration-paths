<?php

namespace matt127127\MigrationPath;

use matt127127\MigrationPath\Console\Migration\MigrateCommand;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand;

class MigrationServiceProvider extends \Illuminate\Database\MigrationServiceProvider
{
    public function register()
    {
        parent::register();

        $this->registerMigrateCommand();
    }

    protected function registerMigrateCommand()
    {
        $this->app->singleton(MigrateMakeCommand::class, function($app) {
            return new MigrateCommand($app['migration.creator'], $app['composer']);
        });
    }
}
