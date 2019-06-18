<?php

namespace App\DevUtils\Schema;

use Illuminate\Support\Arr;

class SchemaBuilder
{
    /**
     * List of columns
     *
     * @var $columns
     */
    private $columns;

    /**
     * Column Name
     *
     * @var $columnName
     */
    private $columnName;

    /**
     * Schema String
     *
     * @var $schema
     */
    private $schema = '';

    /**
     * SchemaBuilder constructor.
     *
     * @param $columns
     */
    public function __construct($columns)
    {
        $this->columns = $columns;
    }

    /**
     * Set Column Name
     */
    public function setColumnName()
    {
        $this->columnName = Arr::first($this->columns);
    }

    /**
     * Set Column Type
     */
    public function setColumnType()
    {
        $this->removeFirstArray();

        if (preg_match('/(.+?)\(([^)]+)\)/', Arr::first($this->columns), $matches)) {
            $columnType = $matches[1];
            $columnArgs = $matches[2];
        } else {
            $columnType = $this->columns[0];
        }

        $this->schema .= '$table->'.$columnType.'(\''.$this->columnName;

        if (isset($columnArgs)) {
            $this->schema .=   '\', ' . $columnArgs . ')';
        } else {
            $this->schema .=  '\')';
        }
    }

    /**
     * Set Default Attr
     */
    public function setDefaultAttr()
    {
        $this->removeFirstArray();
        if (count($this->columns) > 0) {
            foreach ($this->columns as $key => $attr) {
                if (preg_match('/(.+?)\(([^)]+)\)/', $attr, $matches)) {
                    $type = $matches[1];
                    $args = $matches[2];
                } else {
                    $type = $this->columns[0];
                    $args = '';
                }

                $this->schema .= '->' . $type . '('.$args.')';
            }
        }

        $this->schema .= ';';
    }

    public function getSchema()
    {
        return $this->schema;
    }


    /**
     * Remove First Array
     */
    public function removeFirstArray()
    {
        array_shift($this->columns);
    }
}