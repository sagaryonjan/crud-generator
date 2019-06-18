<?php

namespace App\DevUtils\AppTrait;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;

trait Module {

    /**
     * Get Title
     */
    public function getTitle()
    {
        return str_replace('-', ' ', ucwords($this->module['name'], '-'));
    }

    /**
     * Get Snake Case Module Name
     */
    public function getSnakeCaseModuleName()
    {
       return Str::slug($this->module['name'], '_');
    }

    /**
     * Get Module Fields
     */
    public function getFields()
    {
        $fields = [];
        $schemas = explode(',', $this->module['fields']);

        foreach ($schemas as $schema) {
            $fields[] = Arr::first(explode(':', $schema));
        }

        return $fields;
    }



}