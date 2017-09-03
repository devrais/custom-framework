<?php

namespace App\Libs;

class View {

    public function __construct()
    {
    }

    public function render($viewPath){

        require_once 'views/header.php';
        require_once $viewPath;
        return true;
    }
}
