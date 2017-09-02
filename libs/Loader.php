<?php

require 'controllers/index.php';
require 'helpers/Validator.php';

class Loader
{
    private $validator;

    public function executeMethod($controller, $method = "", $parameter = "")
    {
        //If method is valid need to check if we have a parameter
        if (!empty($parameter)) {
            $controller->{$method}($parameter);
        } else {
            $controller->{$method}();
        }
        return true;
    }

    public function __construct()
    {
        $this->validator = new Validator();

        // Get url parameters
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (!$this->validator->processUrl($url)) {
            return false;
        }

        // If no parameters go to index controller
        // Also if we state index in the url

        if (empty($url[0]) || $url[0] == 'index') {
            $controller = new Index();
            $controller->index();
            return false;
        }

        // When controller is not default/index
        // We try to call the controller from GET parameters

        $controller = $this->validator->validateController($url[0]);

        if ($controller == false) {
            return false;
        }

        (isset($url[1])) ? $method = $url[1] : $method = "";
        (isset($url[2])) ? $parameter = $url[2] : $parameter = "";

        if (!$this->validator->validateMethod($controller, $method, $parameter)) {
            return false;
        }

        $this->executeMethod($controller, $method, $parameter);
        return true;

    }

}