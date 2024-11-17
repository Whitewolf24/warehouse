<?php

namespace App\Ext;

use PDO;

class getitems extends db
{
    // Grab every row in the database //
    public function grabobj()
    {
        $sql = "SELECT * FROM stock";
        $stmt = $this->connect()->query($sql);
        while ($rows = $stmt->fetchAll()) {
            foreach ($rows as $obj) {
                echo '<div class="box"> 
                <input class="delete-checkbox" type="checkbox" name="id[]" value="' . $obj["ID"] . '">
                <div class=fields>
                          <p>' . $obj["SKU"] . '</p> 
                          <p>' . $obj["Name"] . '</p> 
                          <p>' . $obj["Price"] . '</p> 
                          <p>' . $obj["Size"] . '</p> 
                          <p>' . $obj["Height"] . $obj["Width"] . $obj["Length"] . '</p> 
                          <p>' . $obj["Weight"] . '</p> 
                          </div>
                       </div>
                      ';
            }
        }
    }
}
