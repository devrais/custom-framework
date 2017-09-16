<?php

namespace App\Controllers;

use App\Libs\Controller;

class ClientController extends Controller
{

    public function index()
    {
        $model = $this->getModel('Client');

        if ($model == false) {
            return false;
        }

        $this->getView()->data = $model->listClients();
        $this->getView()->render('views/client/index.php');
        return true;
    }

    public function create()
    {

        $model = $this->getModel('Client');

        if ($model == false) {
            return false;
        }

        if (isset($_POST['client']) && !empty($_POST['client'])) {
            $id = $model->createClient($_POST['client']);
            $this->view($id);
            return true;
        }

        $this->getView()->render('views/client/create.php');
        return true;

    }

    public function update($id)
    {
        $model = $this->getModel('Client');

        if ($model == false) {
            return false;
        }

        if(isset($_POST['client']) && !empty($_POST['client'])){
           $id = $model->updateClient($id, $_POST['client']);

            if ($id == false) {
                return false;
            }

            $this->getView()->data = $model->viewClientDetails($id);
            $this->getView()->render('views/client/view.php');
            return true;
        }

        $this->getView()->data = $model->viewClientDetails($id);
        $this->getView()->render('views/client/update.php');
        return true;

    }

    public function delete($id)
    {

    }

    public function view($id)
    {

        $model = $this->getModel('Client');

        if ($model == false) {
            return false;
        }

        $client = $model->viewClientDetails($id);

        if ($client == false) {
            return false;
        }

        $this->getView()->data = $model->viewClientDetails($id);
        $this->getView()->render('views/client/view.php');
        return true;
    }
}