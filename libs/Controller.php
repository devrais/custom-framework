<?php

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
        $path = 'models/'.$name.'_model.php';

        if (file_exists($path)) {
            require 'models/'.$name.'_model.php';

            $modelName = ucfirst($name) . '_Model';
            $this->model = new $modelName();
            return $this->model;
        }else{
            (new Fail())->displayError('This model does not exist');
        }
    }

    public function getModel($name){

        return $this->loadModel($name);
    }
}