<?php 

class Database
{
    private $host="localhost";
    private $db_name = "lab_7_webdev";
    private $username = "root";
    private $password = "";
    public $conn;

public function getConnection()
{
    $this->conn = new mysqli($this->host, $this->username,$this->password,$this->db_name);

    if ($this->conn->connect_error)
    {
        die("Connection failed: " . $this->conn->connect_error);
    }
    else
    {

    }

    return $this->conn;
}
}




