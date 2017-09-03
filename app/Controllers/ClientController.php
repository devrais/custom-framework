<?php

namespace App\Controllers;

use App\Libs\Controller;

class ClientController extends Controller {

    public function index(){
        $model = $this->getModel('Client');

        if($model == false){
            return false;
        }

        $this->getView()->clients = $model->listClients();
        $this->getView()->render('views/client/index.php');
        return true;
    }

    public function create(){

        $model = $this->getModel('Client');

        if(isset($_POST['client']) && !empty($_POST['client'])){

        }

        $this->getView()->render('views/client/create.php');
        return true;

    }

    public function update($id){

    }

    public function delete($id){

    }

    public function view($id){

    }
}