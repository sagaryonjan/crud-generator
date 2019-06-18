<?php

namespace App\DevUtils\Files;

use Illuminate\Support\Str;

abstract class FileInterface
{
    /**
     * Generate file
     */
    abstract public function generate();

    /**
     * Set Class Name
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get Path
     */
    public function getPath()
    {
        return $this->config->get('generator.' . $this->name . '.path');
    }

    /**
     * Get File Name
     */
    public function getFileName()
    {
        return $this->className . $this->fileExtention;
    }

    /**
     * Set Class Name By Module
     */
    public function setClassNameByModule()
    {
        if (strpos($this->module['name'], '-')) {
            $className = str_replace('-', '', ucwords($this->module['name'], '-'));
        } else {
            $className = ucfirst($this->module['name']);
        }

        if ($this->config->get('generator.' . $this->name . '.suffix')) {
            $this->className = $className . ucfirst($this->name);
        } else {
            $this->className = $className;
        }
    }

    /**
     * Get Table Name
     *
     * @return string
     */
    public function getTableName()
    {
        return Str::plural(Str::slug($this->module['name'], '_'));
    }

    /**
     * Get Class Name
     *
     * @return string
     */
    public function getClassName()
    {
        return str_replace('-', '', ucwords(Str::plural($this->module['name']), '-'));
    }

    /**
     * Get Class Name By File
     */
    public function getClassNameByFile($name)
    {
        if (strpos($this->module['name'], '-')) {
            $className = str_replace('-', '', ucwords($this->module['name'], '-'));
        } else {
            $className = ucfirst($this->module['name']);
        }

        if ($this->config->get('generator.' . $name . '.suffix')) {
            $className = $className . ucfirst($name);
        }

        return $className;
    }

}
