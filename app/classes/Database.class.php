<?php

class Database{
    private $servername = "localhost";
    private $dbusername = "root";
    private $dbpassword = "";
    private $dbname = "jckkniva_bscs3b";
    protected $acronym = 'dgjmp_';

    protected function connect(){
        $conn = new mysqli($this->servername, $this->dbusername, $this->dbpassword, $this->dbname);

        if ($conn->connect_errno){
            die("Connection Failed:" . $conn->connect_errno);
        }

        return $conn;
    }
}