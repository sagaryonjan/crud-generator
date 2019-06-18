<?php

namespace App\DevUtils\Files;

use App\DevUtils\Services\Stub;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\Arr;

class Model extends FileInterface
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
    protected $name = 'model';

    /**
     * Module Name
     */
    protected $module;

    /**
     * File Extention
     */
    protected $fileExtention = '.php';

    /**
     * Class Name
     */
    protected $className;

    public function __construct(Stub $stub, Config $config)
    {
        $this->stub = $stub;
        $this->config = $config;
    }

    /**
     * Generate Model
     */
    public function generate()
    {
        $this->setClassNameByModule();

        $this->stub->file($this->name);
        $this->stub->patterns([
            '{NAMESPACE}' => config('generator.model.namespace'),
            '{FIELDS}' => $this->getFields(),
            '{CLASS_NAME}' => $this->className
        ]);
        $this->stub->updateContent();
        $this->stub->make($this->getPath() . DIRECTORY_SEPARATOR . $this->getFileName());

        return [ucfirst($this->name), $this->getFileName(), $this->getPath()];
    }

    /**
     * Get Model Field
     */
    public function getFields()
    {
        $fields = [];
        $schemas = explode(',', $this->module['fields']);

        foreach ($schemas as $schema) {
            $fields[] = Arr::first(explode(':', $schema));
        }

        return implode("', '", $fields);
    }
}
