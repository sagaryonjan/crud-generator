<?php

namespace App\DevUtils\Console;

use App\DevUtils\Generator;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class CrudGeneratorCommand
 * @package Neputer\UtilApp\Generator\Console
 */
final class CrudGenerator extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CRUD Generator';

    /**
     * Files For Generating
     */
    protected $files = ['migration', 'model', 'route', 'controller', 'view'];
   // protected $files = ['controller'];
    /**
     * Generator
     */
    protected $generator;

    /**
     * CrudGeneratorCommand constructor.
     * @param Generator $generator
     */
    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @throws \Exception
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(count($this->files));
        $bar->start();
        $this->generator->setModule($this->getModule());
        $this->generator->progressBar($bar);
        $this->generator->files($this->files);
        $this->generator->run();
        $bar->finish();
        $this->info('List of files generated and updated.');

        $headers = ['File', 'File Name', 'Path'];
        $this->table($headers, $this->generator->getCreatedFileRecords());
    }

    /**
     * Set Module
     */
    public function getModule()
    {
        $module = [];
        $module['name'] = Str::slug($this->argument('name'), '-');
        $module['fields'] = $this->option('fields');

        return $module;
    }

    /**
     * Get the console command arguments
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name of the Module to be generated.'],
        ];
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['fields', 'f', InputOption::VALUE_OPTIONAL, 'For updating migration schema']
        ];
    }
}
