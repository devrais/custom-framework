<?php

require 'database_inputs.php';

class Database {

    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . DBInputs::HOST. "dbname=" . DBInputs::DB_NAME, DBInputs::USER, DBInputs::PASSWORD);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}