<?php

namespace App\Controllers;

use App\Libs\Controller;

class IndexController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->getView()->render('views/index/index.php');
    }

}