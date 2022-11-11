<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

<?php
class getitems extends db
{
    // Grab every row in the database //
    protected function grabdatabase()
    {
        $sql = "SELECT *  FROM stock";

        $result = $this->connect()->query($sql);
        $rows = $result->num_rows;
        if ($rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $data[] = $rows;
            }
            return $data;
        }
    }

    // Grab the POSTS from the add-product page, and modify them if required, before insertion //
    protected function grabsku()
    {
        $sku =  $_POST['sku'];
        if (!empty($sku)) {
            return $sku;
        } else {
            return null;
        }
    }

    protected function grabname()
    {
        $name =  $_POST['name'];
        if (!empty($name)) {
            return $name;
        } else {
            return null;
        }
    }

    protected function grabprice()
    {
        $price =  $_POST['price'];
        if (!empty($price)) {
            @$decim = number_format($price, 2, '.', '');
            @$decim .= "$";
            return $decim;
        } else {
            return null;
        }
    }

    protected function grabsize()
    {
        $size =  $_POST['size'];
        if (!empty($size)) {
            $finalsize = 'Size: '  . $size . ' MB';
            return $finalsize;
        } else {
            return null;
        }
    }

    protected function grabheight()
    {
        $height =  $_POST['height'];
        if (!empty($height)) {
            $finalheight = 'Dimension: ' . $height;
            return $finalheight;
        } else {
            return null;
        }
    }

    protected function grabwidth()
    {
        $width =  $_POST['width'];
        if (!empty($width)) {
            $finalwidth = 'x' . $width . 'x';
            return $finalwidth;
        } else {
            return null;
        }
    }

    protected function grablength()
    {
        $length =  $_POST['length'];
        if (!empty($length)) {
            return $length;
        } else {
            return null;
        }
    }

    protected function grabweight()
    {
        $weight =  $_POST['weight'];
        if (!empty($weight)) {
            $finalweight = 'Weight: ' . $weight . 'KG';
            return $finalweight;
        } else {
            return null;
        }
    }
}
?>

<script>
    $(document).ready(function() {
        let sku_value;
        let price_value;
        let name_value;
        let size_value;
        let weight_value;
        let width_value;
        let height_value;
        let length_value;
        
        // Get the POSTS parsed to JS through JSON //
        sku_value = JSON.parse('<?php echo json_encode($_POST['sku']) ?>');
        sku_string = JSON.stringify(sku_value);
        sku_true = sku_string.replace(/"/g, "");
        price_value = JSON.parse('<?php echo json_encode($_POST['price']) ?>');
        price_string = JSON.stringify(price_value);
        price_true = price_string.replace(/"/g, "");
        name_value = JSON.parse('<?php echo json_encode($_POST['name']) ?>');
        name_string = JSON.stringify(name_value);
        name_true = name_string.replace(/"/g, "");
        size_value = JSON.parse('<?php echo json_encode($_POST['size']) ?>');
        size_string = JSON.stringify(size_value);
        size_true = size_string.replace(/"/g, "");
        weight_value = JSON.parse('<?php echo json_encode($_POST['weight']) ?>');
        weight_string = JSON.stringify(weight_value);
        weight_true = weight_string.replace(/"/g, "");
        width_value = JSON.parse('<?php echo json_encode($_POST['width']) ?>');
        width_string = JSON.stringify(width_value);
        width_true = width_string.replace(/"/g, "");
        height_value = JSON.parse('<?php echo json_encode($_POST['height']) ?>');
        height_string = JSON.stringify(height_value);
        height_true = height_string.replace(/"/g, "");
        length_value = JSON.parse('<?php echo json_encode($_POST['length']) ?>');
        length_string = JSON.stringify(length_value);
        length_true = length_string.replace(/"/g, "");

         // Save the parsed values into sesion //
        sessionStorage.setItem ('sku_sess',sku_true);
        sessionStorage.setItem ('price_sess',price_true);
        sessionStorage.setItem ('name_sess',name_true);
        sessionStorage.setItem ('size_sess',size_true);
        sessionStorage.setItem ('weight_sess',weight_true);
        sessionStorage.setItem ('height_sess',height_true);
        sessionStorage.setItem ('width_sess',width_true);
        sessionStorage.setItem ('length_sess',length_true);
        
         // Get the values//
        let sku_memory = sessionStorage.getItem ('sku_sess');
        let price_memory = sessionStorage.getItem ('price_sess');
        let name_memory = sessionStorage.getItem ('name_sess');
        let size_memory = sessionStorage.getItem ('size_sess');
        let weight_memory = sessionStorage.getItem ('weight_sess');
        let height_memory = sessionStorage.getItem ('height_sess');
        let width_memory = sessionStorage.getItem ('width_sess');
        let length_memory = sessionStorage.getItem ('length_sess');
        
        // Populate fields with session //
       if (sessionStorage.getItem ('sku_sess') == "null")
       {
       $("#sku").val("");
       }
       else {
        $("#sku").val(sku_memory);
       }
       
       if (sessionStorage.getItem ('price_sess') == "null")
       {
       $("#price").val("");
       }
       else {
        $("#price").val(price_memory);
       }
        
        if (sessionStorage.getItem ('name_sess') == "null")
       {
       $("#name").val("");
       }
       else {
        $("#name").val(name_memory);
       }
        
        if (sessionStorage.getItem ('size_sess') == "null")
       {
       $("#size").val("");
       }
       else {
        $("#size").val(size_memory);
       }
        
        if (sessionStorage.getItem ('weight_sess') == "null")
       {
       $("#weight").val("");
       }
       else {
        $("#weight").val(weight_memory);
       }
        
        if (sessionStorage.getItem ('height_sess') == "null")
       {
       $("#height").val("");
       }
       else {
        $("#height").val(height_memory);
       }
        
        if (sessionStorage.getItem ('width_sess') == "null")
       {
       $("#width").val("");
       }
       else {
        $("#width").val(width_memory);
       }
        
        if (sessionStorage.getItem ('length_sess') == "null")
       {
       $("#length").val("");
       }
       else {
        $("#length").val(length_memory);
       }
    });
</script>