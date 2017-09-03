<?php

namespace App\Libs;

use App\Controllers\FailController;

class Controller
{
    private $view;
    private $model;
    public $message;

    public function __construct()
    {
        $this->view = new View();
    }

    public function getView()
    {
        return $this->view;
    }

    private function loadModel($name)
    {
        $model = 'App\Models\\'.$name.'Model';
        if(class_exists($model)){
            $this->model = new $model();
            return true;
        }else{
            (new FailController())->displayError('This model does not exist');
            return false;
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function getModel($name){
        $this->loadModel($name);
        return $this->model;
    }
}