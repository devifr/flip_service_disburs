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
    $servername = $GLOBALS['SERVER_NAME'];
    $username = $GLOBALS['USER_NAME'];
    $password = $GLOBALS['USER_NAME'];
    $dbname = $GLOBALS['DBNAME'];
    // Create connection
    $this->conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($this->conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
  }

  public function execute_qry($qry)
  {
    return $this->conn->query($qry);
  }
}
