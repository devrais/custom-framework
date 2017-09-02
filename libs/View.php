<?php

class View {

    public function __construct()
    {
    }

    public function render($viewPath){

        require 'views/header.php';
        require $viewPath;
        return true;
    }
}
