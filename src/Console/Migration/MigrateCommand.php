<?php


namespace matt127127\MigrationPath\Console\Migration;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Database\Console\Migrations\MigrateMakeCommand;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Database\Migrations\Migrator;
use Illuminate\Support\Composer;

class MigrateCommand extends MigrateMakeCommand
{

    protected $description = 'Create a new migration file, default path set to include year and month in the migrations folder';

    public function __construct(MigrationCreator $creator, Composer $composer)
    {
        parent::__construct($creator, $composer);
    }

    public function handle()
    {

        if ($this->input->hasOption('path') && $this->input->getOption('path') === null) {
            $this->input->setOption('path', 'database/migrations/' . date('Y') . '/' . date('m'));
            $this->input->setOption('fullpath', true);
        }

        parent::handle();

    }

}
