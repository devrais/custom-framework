<?php

class Index extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->getView()->render('views/index/index.php');
    }

}