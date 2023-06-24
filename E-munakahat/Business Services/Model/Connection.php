<?php

class DatabaseConnection{
    private $mysqli;

    public function __construct($host, $database, $username, $password)
    {
      $this->mysqli = new mysqli($host, $username, $password, $database);

      if ($this->mysqli->connect_error) {
        die("Connection failed: " . $this->mysqli->connect_error);
      }

    }

    public function getMysqli(){
        return $this->mysqli;
    }

    public function close(){
        $this->mysqli->close();
    }
}

?>