<?php


namespace matt127127\MigrationPath\Console\Migration;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Migrations\Migrator;

class MigrateCommand extends \Illuminate\Database\Console\Migrations\MigrateCommand
{

    public function handle()
    {

        if (!$this->hasOption('path')) {
            $this->addOption('path', null, null, null, 'database/migrations/' . date('Y') . '/' . date('m'));
        }

    }

}
