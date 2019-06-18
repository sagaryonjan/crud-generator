<?php

namespace App\DevUtils\Files;

use App\DevUtils\Services\Stub;
use Illuminate\Config\Repository as Config;

class Service extends FileInterface
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
     * File Name
     */
    protected $name = 'service';

    /**
     * Module Name
     */
    protected $module;

    /**
     * File Extention
     */
    protected $fileExtention = '.php';

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
        $this->setClassNameByModule();
        $this->stub->file($this->name);
        $this->stub->patterns([
            '{CLASS_NAME}' => $this->className,
            '{VAR_CLASS_NAME}' => '$' . strtolower($this->className),
        ]);
        $this->stub->updateContent();
        $this->stub->saveContentTo($this->getPath() . $this->getFileName());

        return [ucfirst($this->name), $this->getFileName(), $this->getPath()];
    }
}
