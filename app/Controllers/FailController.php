<?php

namespace App\Controllers;

use App\Libs\Controller;

class FailController extends Controller{

    public function __construct()
    {
        parent::__construct();
    }

    public function baseError(){
      //  echo "We have a serious error !";
    }

    public function wrongUrl(){
        echo 'Url was formed incorrectly';
    }

    public function absentController($controller){
        echo 'Do not have this controller - '.$controller;
    }

    public function absentMethod($method){
        echo $method. ' Method does not exist';
    }

    public function unsetMethod(){
        echo 'Method name was absent from the GET parameters list';
    }

    public function unsetParameter(){
        echo 'You need to add a parameter';
    }
    
    public function zeroParameter(){
        echo "You can't use value 0 for a parameter";
    }

    public function displayError($message){

        $view = $this->getView();
        $view->message = $message;
        $view->render('views/error/index.php');
        exit();
    }
}