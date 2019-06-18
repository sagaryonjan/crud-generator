<?php

namespace App\DevUtils\Files;

use App\DevUtils\AppTrait\Module;
use App\DevUtils\Files\Patterns\CreatePattern;
use App\DevUtils\Files\Patterns\EditPattern;
use App\DevUtils\Files\Patterns\IndexPattern;
use App\DevUtils\Files\Patterns\ViewPattern;
use Illuminate\Support\Str;
use App\DevUtils\Services\Stub;
use Illuminate\Config\Repository as Config;

class View extends FileInterface
{
    use Module;

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
    public $module;

    /**
     * File Extention
     */
    protected $fileExtention = '.blade.php';

    /**
     * File Name
     */
    protected $name = 'view';

    /**
     * Files to be created
     *
     * @var array
     */
    protected $files = [
        'create' => CreatePattern::class,
        'index' => IndexPattern::class,
        'edit' => EditPattern::class,
        'view' => ViewPattern::class,

    ];

    /**
     * View constructor.
     *
     * @param Stub $stub
     * @param Config $config
     */
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
        $moduleName = Str::slug($this->module['name'], '_');
        $folder = $this->getPath() . DIRECTORY_SEPARATOR . $moduleName . DIRECTORY_SEPARATOR;

        $this->stub->mkdir($folder);

        $files = [];
        foreach ($this->files as $file => $pattern) {
            $this->stub->file('view' . DIRECTORY_SEPARATOR . $file . '.blade');
            //dd();
            $this->stub->patterns((new $pattern($this))());
            $this->stub->updateContent();
            $this->stub->make($folder . $file . $this->fileExtention);
            $files[] = $file;
        }

        return ['View', '[' . implode(',', $files) . ']' . $this->fileExtention, $folder];
    }

    /**
     * Manage patterns according to file
     *
     * @param $file
     * @return mixed
     */
    public function pattern($file)
    {
        $table_th ='';
        $table_td ='';

        if($this->module['fields']) {
            $fields = $this->getFields();
            $th = [];
            $td = [];
            foreach ($fields as $field) {
                if (strpos($field, '_')) {
                    $fieldName = str_replace('_', ' ', ucwords($field, '_'));
                } else {
                    $fieldName = ucfirst($field);
                }

                $th[] = '<th>'.$fieldName.'</th>';
                $td[] = '<td>{{ $'. $this->getSnakeCaseModuleName().'->'.$field.' }}</td>';
            }
            $th[] = '<th>Action</th>';
            $table_th = implode(PHP_EOL . "\t\t\t\t\t\t", $th);
            $table_td = implode(PHP_EOL . "\t\t\t\t\t\t", $td);
        }

        $field_form = explode(',', $this->module['fields']);
        $form =  view('generator::form', compact('field_form'))->render();


        $patterns = [
            'index' => [
                '{TITLE}' => $this->getTitle(),
                '{VAR_MODULE_PLURAL}' => $this->getTableName(),
                '{VAR_MODULE_SINGULAR}' => $this->getSnakeCaseModuleName(),
                '{TABLE_HEAD}' => $table_th,
                '{TABLE_BODY}' => $table_td
            ],
            'create' => [
                '{TITLE}' => $this->getTitle(),
                '{VAR_MODULE_PLURAL}' => $this->getTableName(),
                '{VAR_MODULE_SINGULAR}' => $this->getSnakeCaseModuleName(),
                '{FORM}' => $form
            ]
        ];

        if(isset($patterns[$file])) {
            return $patterns[$file];
        } else {
            return [];
        }
    }
}
