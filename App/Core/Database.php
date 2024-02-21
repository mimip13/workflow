<?php

namespace App\Core;

use PDO;

class Database extends PDO{
    private $dsn;
    private $username;
    private $password;
    private $options;
    public function __construct()
    {
        $dsn="mysql:host=mysql;dbname=marketlev;charset=utf8;port=3306";
        $username="root";
        $password="Greta92";
        $options=[];
        parent::__construct($dsn, $username, $password, $options);
    }
}