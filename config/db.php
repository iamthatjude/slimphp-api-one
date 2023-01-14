<?php

class DB {
    private $host = 'locahost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'slimphp_api_one';

    public function connect(){
        $conn_str = "mysql:host=$this->host;dbname=$this->dbname";
        $conn = new PDO($conn_str, $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    }
}