<?php

namespace App\Ext;

use PDO;
use PDOException;

class db
{
    private $host;
    private $dBUsername;
    private $dBPassword;
    private $dBname;

    protected function connect()
    {
        $this->host = "mysql";
        $this->dBUsername = "root";
        $this->dBPassword = "";
        $this->dBname = "warehouse";

        /*         $this->host = "localhost";
        $this->dBUsername = "id21410839_marinos";
        $this->dBPassword = "@24shinigamI92";
        $this->dBname = "id21410839_warehouse"; */

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dBname;
            $pdo = new PDO($dsn, $this->dBUsername, $this->dBPassword);

            // Set PDO attributes
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Enable exceptions
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Fetch as associative array

            return $pdo;
        } catch (PDOException $e) {
            // Handle connection errors
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
