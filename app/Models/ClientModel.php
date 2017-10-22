<?php

namespace App\Models;

use App\Configuration\DatabaseConfiguration;
use App\Controllers\FailController;
use App\Libs\Model;

class ClientModel extends Model
{

    private $id;
    private $name;
    private $text;
    private $create_at;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getCreateAt()
    {
        return $this->create_at;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param string $create_at
     */
    public function setCreateAt($create_at)
    {
        $this->create_at = $create_at;
    }

    public function __construct()
    {
        parent::__construct();
        $this->conn = (new DatabaseConfiguration())->getConnection();
        $this->errorHandler = new FailController();
    }

    public function listClients()
    {

        $query = "SELECT * FROM client;";

        $stmt = $this->conn->prepare($query);

        if (!$stmt->execute()) {
            $this->errorHandler->displayError("Failed to get data about clients !!!");
            return false;
        }

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function createClient($data)
    {
        $query = "INSERT INTO client SET `name`=:full_name, text=:text, created_at=:created_at;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam("full_name", $data['name']);
        $stmt->bindParam("text", $data['text']);
        $date = date("Y-m-d H:i:s");
        $stmt->bindParam("created_at", $date);

        if (!$stmt->execute()) {
            $this->errorHandler->displayError("Failed to add this client");
            return false;
        }

        return $this->conn->lastInsertId();

    }

    public function updateClient($id, $data)
    {
        $query = "UPDATE client SET `name`=:full_name, text=:text WHERE id=:id";

        $this->conn->beginTransaction();

        try {
            $stmt = $this->conn->prepare($query);

            $stmt->bindValue("id", $id);
            $stmt->bindParam("full_name", $data['name']);
            $stmt->bindParam("text", $data['text']);

            if (!$stmt->execute()) {
                $this->errorHandler->displayError("Failed to add this client");
                return false;
            }

            $this->conn->commit();
            return $id;

        } catch (\Exception $e) {
            $this->conn->rollBack();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            return false;
        }

    }

    public function deleteClient($id) {
        $query = "DELETE FROM client WHERE id=:id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindValue("id", $id);

        if (!$stmt->execute()) {
            $this->errorHandler->displayError("Failed to delete client with ID = ". $id );
            return false;
        }
        
        return true;
    }

    public function viewClientDetails($id)
    {
        $query = "SELECT * FROM client where id=:id;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam("id", $id);

        if (!$stmt->execute()) {
            $this->errorHandler->displayError("Failed to get client info !!!");
            return false;
        }

        $client = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($client == null) {
            $this->errorHandler->displayError("This client does not exist ");
            return false;
        }

        return $client;
    }
}