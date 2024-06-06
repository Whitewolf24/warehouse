<?php
//require 'db.php';
//require 'getitems.php';
//require 'insertitems.php';
//require 'maincontent.php';

spl_autoload_register('autoloader');

function autoloader($class)
{
   $path = "./";
   $ext = ".php";
   $dir = $path . $class . $ext;

   include_once $dir;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Add</title>
   <link rel="stylesheet" href="./style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <script defer src="script.js"></script>
</head>

<body>
   <form id="product_form" name="product_form" method="post">
      <header>
         <h1>Product List</h1>
           <div class="buttons">
            <button id="save-product-btn" name="save" type="submit">Save</button>
            <button id="cancel-btn" name="cancel" type="submit">Cancel</button>
            <?php if (isset($_POST['cancel'])) {
            ?>
               <script>
                  window.location.href = "../index.php";
               </script>
               <!-- header("Location: ../index.php"); -->
            <?php }  ?>
         </div>
      </header>
      <main id="main_content_add">
         <div id="main_content_add_grid">

            <?php
            $main = new content();
            $main->main_content();
            ?>

            <div id="product_desc">
               <span id="size_desc"> Please, provide size in MB</span><br>
               <span id="weight_desc"> Please, provide book weight</span><br>
               <span id="hwl_desc"> Please, provide dimensions in HxWxL format</span><br>
            </div><br>
         </div>
      </main>
      <footer>
         <!--   <p>Scandiweb Test Assignment</p> -->
      </footer>
   </form>
   <script>
      $(document).ready(function() {
         // Get the POSTS parsed to JS through JSON //
         sku_value = JSON.parse(`<?php echo json_encode($_POST['sku']) ?>`);
         sku_string = JSON.stringify(sku_value);
         sku_true = sku_string.replace(/"/g, "");
         price_value = JSON.parse(`<?php echo json_encode($_POST['price']) ?>`);
         price_string = JSON.stringify(price_value);
         price_true = price_string.replace(/"/g, "");
         name_value = JSON.parse(`<?php echo json_encode($_POST['name']) ?>`);
         name_string = JSON.stringify(name_value);
         name_true = name_string.replace(/"/g, "");
         size_value = JSON.parse(`<?php echo json_encode($_POST['size']) ?>`);
         size_string = JSON.stringify(size_value);
         size_true = size_string.replace(/"/g, "");
         weight_value = JSON.parse(`<?php echo json_encode($_POST['weight']) ?>`);
         weight_string = JSON.stringify(weight_value);
         weight_true = weight_string.replace(/"/g, "");
         width_value = JSON.parse(`<?php echo json_encode($_POST['width']) ?>`);
         width_string = JSON.stringify(width_value);
         width_true = width_string.replace(/"/g, "");
         height_value = JSON.parse(`<?php echo json_encode($_POST['height']) ?>`);
         height_string = JSON.stringify(height_value);
         height_true = height_string.replace(/"/g, "");
         length_value = JSON.parse(`<?php echo json_encode($_POST['length']) ?>`);
         length_string = JSON.stringify(length_value);
         length_true = length_string.replace(/"/g, "");

         // Save the parsed values into sesion //
         sessionStorage.setItem("dvd", "true");
         sessionStorage.setItem('sku_sess', sku_true);
         sessionStorage.setItem('price_sess', price_true);
         sessionStorage.setItem('name_sess', name_true);
         sessionStorage.setItem('size_sess', size_true);
         sessionStorage.setItem('weight_sess', weight_true);
         sessionStorage.setItem('height_sess', height_true);
         sessionStorage.setItem('width_sess', width_true);
         sessionStorage.setItem('length_sess', length_true);
      });
   </script>

   <style>
      @media screen and (max-width: 450px) {
         html {
            transform: scale(0.9) !important;
         }

         form {
            position: relative !important;
            bottom: 4rem !important;
         }

         header {
            left: 0rem !important;
            width: 100% !important;
         }

         #main_content_add {
            margin-inline: 0rem !important;
            position: relative !important;
            right: 2rem !important;
         }

         #save-product-btn {
            right: 4rem !important;
            transform: scale(0.9) !important;
         }

         #cancel-btn {
            left: 4rem !important;
            transform: scale(0.9) !important;
         }

         #productType {
            font-size: max(2.2vmin, 72%) !important;
         }

         .errors {
            font-size: max(2.2vmin, 75%) !important;
         }

         #size_desc {
            font-size: max(2.2vmin, 82%) !important;
         }

         #weight_desc {
            font-size: max(2.2vmin, 82%) !important;
         }

         #hwl_desc {
            font-size: max(2.2vmin, 82%) !important;
         }

         footer {
            left: 0 !important;
            width: 100% !important;
         }
      }
   </style>
</body>

</html>