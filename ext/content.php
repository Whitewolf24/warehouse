<?php

class content extends getitems
{
    public function main_content()
    {
        $sku_err = "";
        $name_err = "";
        $price_err = "";
        $size_err = "";
        $weight_err = "";
        $height_err = "";
        $width_err = "";
        $length_err = "";

        echo '
        <span class="errors" id="sku_error"></span><br>
        <span class="errors" id="name_error"></span><br>
        <span class="errors" id="price_error"></span><br>';

        // Change variable according to error, when empty or invalid input//
        if (isset($_POST['save'])) {
            $sku_duplicate = false;
            $sku_check = $_POST['sku'];

            $sql = "SELECT * FROM stock WHERE SKU = '$sku_check'";
            $stmt = $this->connect()->query($sql);
            $rows = $stmt->fetch();

            switch ($_POST['sku']) {
                case null:
                    $sku_err = '<span class="errors" id="sku_error">Please, submit required data</span><br>';
                    break;
                case !preg_match('/^(?:\d+[a-zA-Z]|[a-zA-Z]+\d)[a-zA-Z\d]*$/', $_POST['sku']):
                    $sku_err = '<span class="errors" id="sku_error">Please, provide the data of indicated type</span><br>';
                    break;
                case !null:
                    if ($rows != 0) {
                        $sku_err = '<span class="errors" id="sku_error">SKU Exists</span><br>';
                        $sku_duplicate = true;
                    }
                    break;
                default:
                    $sku_err = '<span class="errors" id="sku_error"></span><br>';
                    break;
            }

            switch ($_POST['name']) {
                case null:
                    $name_err = '<span class="errors" id="name_error">Please, submit required data</span><br>';
                    break;
                case ctype_space($_POST['name']):
                    $name_err = '<span class="errors" id="name_error">Please, provide the data of indicated type</span><br>';
                    break;
                default:
                    $name_err = '<span class="errors" id="name_error"></span><br>';
                    break;
            }


            switch ($_POST['price']) {
                case null:
                    $price_err = '<span class="errors" id="price_error">Please, submit required data</span><br>';
                    break;
                case !preg_match('/^[0-9]*\.?[0-9]*[^,a-zA-Z]+$/', $_POST['price']):
                    $price_err = '<span class="errors" id="price_error">Please, provide the data of indicated type</span><br>';
                    break;
                default:
                    $price_err = '<span class="errors" id="price_error"></span><br>';
                    break;
            }


            switch ($_POST['productType']) {
                case 'val1':
                    switch ($_POST['size']) {
                        case null:
                            $size_err = '<span class="size_error errors">Please, submit required data</span><br>';
                            break;
                        case !preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['size']):
                            $size_err = '<span class="size_error errors">Please, provide the data of indicated type</span><br>';
                            break;
                        default:
                            $size_err = '<span class="size_error errors"></span><br>';
                            break;
                    }
                case 'val2':
                    switch ($_POST['weight']) {
                        case null:
                            $weight_err = '<span class="weight_error errors">Please, submit required data</span><br>';
                            break;
                        case !preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['weight']):
                            $weight_err = '<span class="weight_error errors">Please, provide the data of indicated type</span><br>';
                            break;
                        default:
                            $weight_err = '<span class="weight_error errors"></span><br>';
                            break;
                    }

                case 'val3':
                    switch ($_POST['height']) {
                        case null:
                            $height_err = '<span class="height_error errors">Please, submit required data</span><br>';
                            break;
                        case !preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['height']):
                            $height_err = '<span class="height_error errors">Please, provide the data of indicated type</span><br>';
                            break;
                        default:
                            $height_err = '<span class="height_error errors"></span><br>';
                            break;
                    }

                    switch ($_POST['width']) {
                        case null:
                            $width_err = '<span class="width_error errors">Please, submit required data</span><br>';
                            break;
                        case !preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['width']):
                            $width_err = '<span class="width_error errors" >Please, provide the data of indicated type</span><br>';
                            break;
                        default:
                            $width_err = '<span class="width_error errors"></span><br>';
                            break;
                    }

                    switch ($_POST['length']) {
                        case null:
                            $length_err = '<span class="length_error errors">Please, submit required data</span><br>';
                            break;
                        case !preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['length']):
                            $length_err = '<span class="length_error errors">Please, provide the data of indicated type</span><br>';
                            break;
                        default:
                            $length_err = '<span class="length_error errors"></span><br>';
                            break;
                    }
            }
        }

        // Echo the inputs and errors //
        echo "
        <span id='sku_span'>SKU</span><input type='text' name='sku' class='no_space' id='sku'>{$sku_err}";
        echo "
        <span id='price_span'>Price ($)</span><input type='text' name='price' class='no_space' id='price' autocomplete='off' maxlength='6'>{$price_err}";
        echo "
        <span id='name_span'>Name</span><input type='text' name='name' id='name' maxlength='15'>{$name_err}";
        echo '
        <span id="types">Type Switcher</span><select id="productType" name="productType"> ';
        echo '                                                                
                <option id="val1" value="val1">DVD</option>
                <option id="val2" value="val2">Book</option>
                <option id="val3" value="val3">Furniture</option>
            </select>
            </div>
            <div id="attrib_form">
                <span class="size_error errors"></span><br>
                <span class="weight_error errors"></span><br>
                <span class="height_error errors"></span><br>
                <span class="width_error errors"></span><br>
                <span class="length_error errors"></span><br>';

        // Echo the inputs and errors //
        echo "<span id='size_span'>Size (MB)</span><input type='text' name='size' class='no_space' id='size' autocomplete='off' maxlength='5'>{$size_err}";
        echo "<span id='weight_span'>Weight (KG)</span><input type='text' name='weight' class='no_space' id='weight' autocomplete='off' maxlength='5'>{$weight_err}";
        echo "<span id='height_span'>Height (CM)</span><input type='text' name='height' class='no_space' id='height' autocomplete='off' maxlength='5'>{$height_err}";
        echo "<span id='width_span'>Width (CM)</span><input type='text' name='width' class='no_space' id='width' autocomplete='off' maxlength='5'>{$width_err}";
        echo "<span id='length_span'>Length (CM)</span><input type='text' name='length' class='no_space' id='length' autocomplete='off' maxlength='5'>{$length_err}";


        // If all the fields are valid call the functions tha writes in the database //
        if (!empty($_POST['sku']) && !$sku_duplicate && preg_match('/^(?:\d+[a-zA-Z]|[a-zA-Z]+\d)[a-zA-Z\d]*$/', $_POST['sku']) && !empty($_POST['price']) && preg_match('/^[0-9]*\.?[0-9]*[^,a-zA-Z]+$/', $_POST['price']) && !empty($_POST['name']) && !ctype_space($_POST['name'])) {
            if ($_POST['productType']  == 'val1' && !empty($_POST['size']) && preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['size'])) {
                $ins = new insertitems();
                $ins->insert($_POST['sku'], $_POST['name'], $_POST['price'], 'Size: ' . $_POST['size'] . ' MB', null, null, null, null);
?>
                <script>
                    window.location.href = "../index.php";
                </script>
                <!-- header("Location: ../index.php"); -->
            <?php
            }
        }

        if (!empty($_POST['sku']) && !$sku_duplicate && preg_match('/^(?:\d+[a-zA-Z]|[a-zA-Z]+\d)[a-zA-Z\d]*$/', $_POST['sku']) && !empty($_POST['price']) && preg_match('/^[0-9]*\.?[0-9]*[^,a-zA-Z]+$/', $_POST['price']) && !empty($_POST['name']) && !ctype_space($_POST['name'])) {
            if ($_POST['productType']  == 'val2' && !empty($_POST['weight']) && preg_match('/^[0-9]*\.?[0-9]*[^,[a-zA-Z]+$/', $_POST['weight'])) {
                $ins = new insertitems();
                $ins->insert($_POST['sku'], $_POST['name'], $_POST['price'], null, 'Weight: ' . $_POST['weight'] . 'KG', null, null, null);
            ?>
                <script>
                    window.location.href = "../index.php";
                </script>
                <!-- header("Location: ../index.php"); -->
            <?php
            }
        }

        if (!empty($_POST['sku']) && !$sku_duplicate && preg_match('/^(?:\d+[a-zA-Z]|[a-zA-Z]+\d)[a-zA-Z\d]*$/', $_POST['sku']) && !empty($_POST['price']) && preg_match('/^[0-9]*\.?[0-9]*[^,a-zA-Z]+$/', $_POST['price']) && !empty($_POST['name']) && !ctype_space($_POST['name'])) {
            if ($_POST['productType']  == 'val3' && !empty($_POST['width']) && !empty($_POST['height']) && !empty($_POST['length'])) {
                $ins = new insertitems();
                $ins->insert($_POST['sku'], $_POST['name'], $_POST['price'], null, null, 'Dimension: ' . $_POST['height'], 'x' . $_POST['width'] . 'x', $_POST['length']);
            ?>
                <script>
                    window.location.href = "../index.php";
                </script>
                <!-- header("Location: ../index.php"); -->
<?php
            }
        }
    }
}
