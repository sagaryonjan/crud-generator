<?php

namespace App\DevUtils\Schema;

class Schema
{
    /**
     * @var $fields
     */
    private $fields;

    /**
     * Set Fields
     *
     * @param $fields;
     * @return $this
     */
    public function setFields($fields)
    {
        $this->fields = $fields;

        return $this;
    }

    /**
     * Build Schema
     *
     * @return array
     */
    public function build()
    {
        $fields = explode(',', $this->fields);
        $schema = [];
        foreach ($fields as $field) {
            $columns = explode(':', $field);
            $builder = new SchemaBuilder($columns);
            $builder->setColumnName();
            $builder->setColumnType();
            $builder->setDefaultAttr();
            $schema[] = $builder->getSchema();
        }
        return implode(PHP_EOL . "\t\t\t", $schema);
    }
}