<?php

class Database {
    private $host;
    private $username;
    private $password;
    private $dbName;

    function __construct() {
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbName = "emp_management";
    }

    public function connect() {
        $con = "mysql:host=". $this->host. ";dbname=". $this->dbName;
        $pdo_con = new PDO($con, $this->username, $this->password);
        $pdo_con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo_con;
    }

}

?>