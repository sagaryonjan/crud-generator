<?php


namespace App\DevUtils\Files\Patterns;


class IndexPattern
{
    /**
     * @var $view
     */
    private $view;

    /**
     * IndexPattern constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    /**
     * Get Patterns
     *
     * @return array
     */
    public function __invoke()
    {
        $table_th ='';
        $table_td ='';

        if($this->view->module['fields']) {
            $fields = $this->view->getFields();
            $th = [];
            $td = [];
            foreach ($fields as $field) {
                if (strpos($field, '_')) {
                    $fieldName = str_replace('_', ' ', ucwords($field, '_'));
                } else {
                    $fieldName = ucfirst($field);
                }

                $th[] = '<th>'.$fieldName.'</th>';
                $td[] = '<td>{{ $'. $this->view->getSnakeCaseModuleName().'->'.$field.' }}</td>';
            }
            $th[] = '<th>Action</th>';
            $table_th = implode(PHP_EOL . "\t\t\t\t\t\t", $th);
            $table_td = implode(PHP_EOL . "\t\t\t\t\t\t", $td);
        }
        return [
            '{TITLE}' => $this->view->getTitle(),
            '{VAR_MODULE_PLURAL}' => $this->view->getTableName(),
            '{VAR_MODULE_SINGULAR}' => $this->view->getSnakeCaseModuleName(),
            '{TABLE_HEAD}' => $table_th,
            '{TABLE_BODY}' => $table_td
        ];
    }
}