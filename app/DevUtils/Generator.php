<?php

namespace App\DevUtils;

use App\DevUtils\Files\Route;
use App\DevUtils\Files\Model;
use App\DevUtils\Files\Controller;
use App\DevUtils\Files\Migration;
use App\DevUtils\Files\View;

class Generator
{
    /**
     * Module Name
     */
    private $module = [];

    /**
     * Progress Bar
     */
    private $bar;

    /**
     * $files
     */
    private $files;

    /**
     * $fileMaps
     */
    private $classes = [
        'migration' => Migration::class,
        'model' => Model::class,
        'route' => Route::class,
        'controller' => Controller::class,
        'view' => View::class,

        //For Future May be
        //'service' => Service::class,
    ];

    /**
     * Created Files
     */
    private $createdFiles = [];

    /**
     * Set Module
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Set Progress Bar
     */
    public function progressBar($bar)
    {
        $this->bar = $bar;
    }

    /**
     * Set Files
     */
    public function files($files)
    {
        $this->files = $files;
    }

    /**
     * Generate All the files.
     */
    public function run()
    {
        if (count($this->files) > 0) {
            foreach ($this->files as $file) {
                $this->createdFiles[] = app($this->classes[$file])
                        ->setModule($this->module)
                        ->generate();
                $this->bar->advance();
            }
        }
        return $this;
    }

    /**
     * Get Created File Records
     */
    public function getCreatedFileRecords()
    {
        return $this->createdFiles;
    }
}
