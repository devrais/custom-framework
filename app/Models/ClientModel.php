<?php

namespace App\Models;

use App\Configuration\DatabaseConfiguration;
use App\Controllers\FailController;
use App\Libs\Model;

class ClientModel extends Model {

    public function __construct()
    {
        $this->conn = (new DatabaseConfiguration())->getConnection();
        $this->errorHandler = new FailController();
    }

    public function listClients(){

        $query = "SELECT * FROM client;";

        $stmt = $this->conn->prepare($query);

        if(!$stmt->execute()){
            $this->errorHandler->displayError("Failed to get data about clients !!!");
            return false;
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createClient(){

    }

    public function updateClient($id){

    }

    public function deleteClient($id){

    }

    public function viewClientDetails($id){

    }
}