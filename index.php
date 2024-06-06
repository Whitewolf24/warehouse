<?php
//require 'ext/db.php';
//require 'ext/getitems.php';
//require 'ext/showitems.php';
//require 'ext/deleteitems.php';

spl_autoload_register('autoloader');

function autoloader($class)
{
   $path = "ext/";
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
   <title>Product List</title>
   <!--  -->
   <link rel="stylesheet" href="ext\style.css">
   <!--  -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
   <form action="" method="post">
      <header>
         <h1>Product List</h1>
           <div class="buttons">
            <button id="add-product-btn" type="submit" name="add">ADD</button>
            <?php if (isset($_POST['add'])) {

            ?>
               <script>
                  window.location.href = "ext/add-product.php";
               </script>
               <!--header("Location: ext/add-product.php"); -->
            <?php
            } ?>
            <button id="delete-product-btn" type="submit" name="massdelete">MASS DELETE</button>
            <?php
            if (isset($_POST['massdelete'])) {
               $erase = new deleteitems();
               @$erase->erase();
            }
            ?>
         </div>
      </header>
      <main>
         <div id="main_content">
            <?php
            $show = new getitems();
            @$show->grabobj();
            ?>
         </div>
      </main>
      <footer>
         <!--  <p>Scandiweb Test Assignment</p> -->
      </footer>
   </form>

   <style>
      @media screen and (max-width: 450px) {
         html {
            transform: scale(0.9) !important;
         }

         form {
            position: relative !important;
            bottom: 4rem !important;
         }

         #main_content {
            margin-inline: 0rem !important;
         }

         header {
            left: 0rem !important;
            width: 100% !important;
         }

         #add-product-btn {
            right: 6rem !important;
            transform: scale(0.9) !important;
         }

         #delete-product-btn {
            left: 4rem !important;
            transform: scale(0.9) !important;
         }

         footer {
            left: 0 !important;
            width: 100% !important;
         }
      }
   </style>
</body>

</html>