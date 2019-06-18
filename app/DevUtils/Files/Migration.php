<?php

namespace App\DevUtils\Files;

use App\DevUtils\Schema\Schema;
use App\DevUtils\Services\Stub;
use Illuminate\Config\Repository as Config;

class Migration extends FileInterface
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
    protected $name = 'migration';

    /**
     * Table Name
     *
     * @var $tableName
     */
    protected $tableName;

    public function __construct(Stub $stub, Config $config)
    {
        $this->stub = $stub;
        $this->config = $config;
    }

    /**
     * Generate Migration Files
     */
    public function generate()
    {
        $this->stub->file($this->name);

        if(isset($this->module['fields'])) {
            $schema = app(Schema::class);
            $schema = $schema->setFields($this->module['fields'])
                ->build();
        } else {
            $schema = '';
        }

        $this->stub->patterns([
            '{TABLE_NAME}' => $this->getTableName(),
            '{SCHEMA}' => $schema,
            '{CLASS_NAME}' => $this->getClassName()
        ]);

        $this->stub->updateContent();
        $this->stub->make($this->getPath() . '/' . $this->getFileName());

        return [ucfirst($this->name), $this->getFileName(), $this->getPath()];
    }

    /**
     * Get File Name
     *
     * @return string
     */
    public function getFileName()
    {
        return date('Y_m_d_His') . '_create_' . $this->getTableName() . '_table' . $this->fileExtention;
    }
}
