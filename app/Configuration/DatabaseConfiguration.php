<?php

namespace App\Configuration;

class DatabaseConfiguration {

    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
           /* $this->conn = new \PDO("mysql:host=" . InputsConfiguration::HOST. "dbname=" . InputsConfiguration::DB_NAME, InputsConfiguration::USER, InputsConfiguration::PASSWORD);
            $this->conn->exec("set names utf8");*/
           $this->conn = new \PDO("mysql:host=".InputsConfiguration::HOST.";dbname=".InputsConfiguration::DB_NAME, InputsConfiguration::USER, InputsConfiguration::PASSWORD);
           $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }catch(\PDOException $exception){
            var_dump("Connection error: " . $exception->getMessage());
        }

        return $this->conn;
    }
}