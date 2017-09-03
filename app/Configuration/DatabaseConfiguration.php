<?php

namespace App\Configuration;

class DatabaseConfiguration {

    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new \PDO("mysql:host=" . InputsConfiguration::HOST. "dbname=" . InputsConfiguration::DB_NAME, InputsConfiguration::USER, InputsConfiguration::PASSWORD);
            $this->conn->exec("set names utf8");
        }catch(\PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}