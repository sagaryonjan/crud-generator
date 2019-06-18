<?php

namespace App\DevUtils\Files;

use App\DevUtils\Services\Stub;
use Illuminate\Config\Repository as Config;
use Illuminate\Support\Str;

class Controller extends FileInterface
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
    protected $name = 'controller';

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
            '{CONTROLLER_NAME}' => $this->className,
            '{CONTROLLER_NAMESPACE}' => $this->config->get('generator.' . $this->name . '.namespace'),
            '{VIEW_PATH}' => $this->getViewPath().'.'.Str::slug($this->module['name'], '_'),
            '{MODEL_NAMESPACE}' => $this->getModelNameSpace(),
            '{MODEL_NAME}' => $this->getClassNameByFile('model'),
            '{PLURAL_VAR_NAME}' => $this->getTableName(),
            '{SINGULAR_VAR_NAME}' => Str::slug($this->module['name'], '_'),
            '{PAGINATION_LIMIT}' => $this->config->get('generator.pagination_limit')
        ]);
        $this->stub->updateContent();

        $this->stub->make($this->getPath() . DIRECTORY_SEPARATOR . $this->getFileName());

        return [ucfirst($this->name), $this->getFileName(), $this->getPath()];
    }

    public function getViewPath()
    {
        $view_path = $this->config->get('generator.view.path');
        $view_base_path = resource_path('views'.DIRECTORY_SEPARATOR);

       return str_replace('/', '.', Str::after($view_path, $view_base_path));
    }

    /**
     * Get Model
     */
    public function getModelNameSpace()
    {
        return config('generator.model.namespace').'\\'.$this->getClassNameByFile('model');
    }
}
