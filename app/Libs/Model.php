<?php

namespace App\Libs;

use App\Configuration\DatabaseConfiguration;

class Model {

    protected $conn;
    public $errorHandler;

    public function __construct()
    {
        $this->conn = (new DatabaseConfiguration())->getConnection();
    }

    public function getConnection(){
        return $this->conn;
    }
}