<?php

class ConnectDatabase
{
    private $servername;
    private $username;
    private $password;
    public  $conn;

    function __construct()
    {
        $this->servername = "vkh7buea61avxg07.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
        $this->username = "g3luh1pmbljuq3xm";
        $this->password = "xprl7wfiniz18d8o";

        $this->connect();
    }


    public function connect()
    {
        try {
          $this->conn = new PDO("mysql:host={$this->servername};dbname=ndzrhmfy700pc9ul", $this->username, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          return $this->conn;
        } catch(PDOException $e) {
          echo "Connection failed: " . $e->getMessage();
        }
    }

}

