<?php

class db
{
    private $host;
    private $dBUsername;
    private $dBPassword;
    private $dBname;

    protected function connect()
    {
        /*$this->host = "Localhost";
        $this->dBUsername = "root";
        $this->dBPassword = "";
        $this->dBname = "warehouse";*/

        $this->host = "localhost";
        $this->dBUsername = "";
        $this->dBPassword = "";
        $this->dBname = "";

        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dBname;
        $pdo = new PDO($dsn, $this->dBUsername,  $this->dBPassword);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
