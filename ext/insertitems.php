<?php

// Class for writing data in the database //

class insertitems extends db
{

    //Insert question marks first for security, before executing the insertion //

    public function insert($sku, $name, $price, $size, $weight, $height, $width, $length)
    {
?>
        <script>
            $(document).ready(function() {
                sessionStorage.clear();
            });
        </script>
<?php
        // mysqli_query($conn, "INSERT INTO stock (SKU,Name,Price,Size,Height,Width,Length,Weight) VALUES ('" . strtoupper($this->grabsku()) . "','" . trim($this->grabname()) .  "','" . $this->grabprice() . "','" . $this->grabsize() . "','" . $this->grabheight() . "','" . $this->grabwidth() . "','" . $this->grablength() . "','" . $this->grabweight() . "');");
        @$decim = number_format($price, 2, '.', '');
        $sql = "INSERT INTO stock(SKU,Name,Price,Size,Weight,Height,Width,Length) VALUES (?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([strtoupper($sku), trim($name), $decim . '$', $size, $weight, $height, $width, $length]);
    }
}
