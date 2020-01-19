<?php
class Model
{
  protected $conn;

  public function __construct()
  {
    $this->connect();
  }

  public function connect()
  {
    $servername = "localhost:3306";
    $username = "root";
    $password = "root";
    $dbname = "flip_service_disburse";
    // Create connection
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($this->conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  }

  public function execute_qry($qry)
  {
    return $this->conn->query($sql);
  }
}
