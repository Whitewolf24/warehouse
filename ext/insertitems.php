<?php

// Class for writing data in the database //

class insertitems extends getitems
{
    public function insert()
    {
        $conn = $this->connect();
        mysqli_query($conn, "INSERT INTO stock (SKU,Name,Price,Size,Height,Width,Length,Weight) VALUES ('" . strtoupper($this->grabsku()) . "','" . trim($this->grabname()) .  "','" . $this->grabprice() . "','" . $this->grabsize() . "','" . $this->grabheight() . "','" . $this->grabwidth() . "','" . $this->grablength() . "','" . $this->grabweight() . "');");
        $conn->close();
?>
        <script>
            window.location.href = "../index.php";
            sessionStorage.clear();
        </script>
<?php
    }
}
