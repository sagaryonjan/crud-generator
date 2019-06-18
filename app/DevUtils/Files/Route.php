<?php

namespace App\DevUtils\Files;

use App\DevUtils\Services\Stub;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\Str;

class Route extends FileInterface
{
    /**
    * Stub File
    */
    protected $stub;

    /**
     * Config file
     */
    protected $config;

    /**
     * Class Name
     */
    protected $className;

    /**
    * Module Name
    */
    protected $module;

    /**
     * File Extention
     */
    protected $fileExtention = '.php';

    /**
     * File Name
     */
    protected $name = 'route';

    public function __construct(Stub $stub, Config $config)
    {
        $this->stub = $stub;
        $this->config = $config;
    }

    /**
     * Generate File
     */
    public function generate()
    {
        $this->stub->file($this->name);

        if (strpos($this->module['name'], '-')) {
            $className = str_replace('-', '', ucwords($this->module['name'], '-'));
        } else {
            $className = ucfirst($this->module['name']);
        }

        $this->stub->patterns([
            '{URL}' => strtolower($this->module['name']),
            '{ROUTE}' => Str::slug($this->module['name'], '_'),
            '{CONTROLLER_NAME}' => $className,
        ]);
        $this->stub->updateContent();
        $this->stub->appendToFile($this->getPath() . DIRECTORY_SEPARATOR . $this->getFileName());

        return [ucfirst($this->name), $this->getFileName(), $this->getPath()];
    }

    public function getPath()
    {
        return $this->config->get('generator.' . $this->name . '.path');
    }

    /**
     * Get File Name
     */
    public function getFileName()
    {
        return $this->config->get('generator.' . $this->name . '.file') . $this->fileExtention;
    }
}
