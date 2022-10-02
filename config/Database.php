<?php

class Database {
    public $conn;
    private $server_name = 'localhost';
    private $username = 'root';
    private $password = "";
    private $db_name = 'vue_todo';

    public function __construct()
    {
        $this->conn = new mysqli($this->server_name, $this->username, $this->password, $this->db_name);

        if($this->conn->connect_error){
            die('Failed connection') . $this->conn->connect->error;
        }
    }
}