<?php

require 'config/Database.php';

class Model {

    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function getConnection(){
        return $this->conn;
    }
}