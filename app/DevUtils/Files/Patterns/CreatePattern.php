<?php


namespace App\DevUtils\Files\Patterns;


use App\Form;
use Illuminate\Support\Arr;

class CreatePattern
{
    /**
     * @var $view
     */
    private $view;


    private $inputTypes =[
        'string' => 'text',
        'boolean' => 'radio',
        'text' => 'textarea',
        'longText' => 'textarea',
        'integer' => 'number',

    ];

    /**
     * CreatePattern constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }


    /**
     * Create Pattern
     *
     * @return array
     */
    public function __invoke()
    {
        $schemas = explode(',', $this->view->module['fields']);

        $form = [];
        foreach ($schemas as $schema) {
            $fieldDetails = $this->getFieldDetails($schema);
            $form[] = $this->wrapper($fieldDetails);
        }
        $mergedForm = implode(PHP_EOL . "\t\t\t\t\t", $form);

        return [
            '{TITLE}' => $this->view->getTitle(),
            '{VAR_MODULE_PLURAL}' => $this->view->getTableName(),
            '{VAR_MODULE_SINGULAR}' => $this->view->getSnakeCaseModuleName(),
            '{FORM}' => $mergedForm
        ];

    }

    public function wrapper($details)
    {
        $tab = "\t\t\t\t\t\t";
        $html = '<div class="form-group  row">'.PHP_EOL;
            $html .= $tab.'<label class="col-sm-2 col-form-label">';
            $html .= $details['title'];
            $html .= '</label>'.PHP_EOL;
            $html .= $tab."\t".'<div class="col-sm-10">'.PHP_EOL;
                $type = $this->inputTypes[$details['type']];
                unset($details['title']);
                unset($details['type']);
                $html .= $tab."\t\t".Form::{$type}(null, $details).PHP_EOL;
            $html .= $tab."\t".'</div>'.PHP_EOL;
        $html .= $tab.'</div>'.PHP_EOL;
        $html .= $tab.'<div class="hr-line-dashed"></div>';

        return $html;
    }

    public function getFieldDetails($schema)
    {
        $details = [];
        $fieldDetails = explode(':', $schema);
        //field name
        $details['name'] = Arr::first($fieldDetails);
        if (strpos($details['name'], '_')) {
            $details['title'] = str_replace('_', ' ', ucwords($details['name'], '_'));
        } else {
            $details['title'] = ucfirst($details['name']);
        }
        $details['id'] = $details['name'];
        $details['class'] = 'form-control';
        //remove first array
        array_shift($fieldDetails);
        //get input type

        if (preg_match('/(.+?)\(([^)]+)\)/', Arr::first($fieldDetails), $matches)) {
            $details['type'] = $matches[1];
        } else {
            $details['type'] = Arr::first($fieldDetails);
        }

        return $details;
    }

}