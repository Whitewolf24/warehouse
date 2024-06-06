<?php

// Class to show items grabbed by the grabdatabase function //
class showitems extends getitems
{
    public function show()
    {
        $datas = $this->grabdatabase();
        //$conn = $this->connect();
        foreach ($datas as $data) {

            echo '
            <div class="box"> 
            <input class="delete-checkbox" type="checkbox" name="id[]" value="' . $data["ID"] . '">
            <div class=fields>
                      <p>' . $data["SKU"] . '</p> 
                      <p>' . $data["Name"] . '</p> 
                      <p>' . $data["Price"] . '</p> 
                      <p>' . $data["Size"] . '</p> 
                      <p>' . $data["Height"] . $data["Width"] . $data["Length"] . '</p> 
                      <p>' . $data["Weight"] . '</p> 
                      </div>
                   </div>
                  ';
        }
    }
}
