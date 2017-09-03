<?php

namespace App\Controllers;

use App\Libs\Controller;

class HelpController extends Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
       $this->getView()->render('views/help/index.php');
    }

    public function todo($id){
        $this->getView()->id = $id;
        $this->getView()->render('views/help/index.php');
    }
}