<?php

// Connect to the database //
class db
{
    private $serverName;
    private $dBUsername;
    private $dBPassword;
    private $dBname;

    protected function connect()
    {
        $this->serverName = "localhost";
        $this->dBUsername = "mariyeyn";
        $this->dBPassword = "8pF255nl3LB5V5_#";
        $this->dBname = "mariyeyn_warehouse";

        $conn = new mysqli($this->serverName, $this->dBUsername, $this->dBPassword, $this->dBname);

        if (!$conn) {
            die("Connection to database failed: " . mysqli_connect_error());
        }

        return $conn;

        $conn->close();
    }
}
