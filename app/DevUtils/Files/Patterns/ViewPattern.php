<?php


namespace App\DevUtils\Files\Patterns;

class ViewPattern
{
    /**
     * @var $view
     */
    private $view;

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
       return [];

    }
}