<?php
require 'db.php';
require 'getitems.php';
require 'insertitems.php';
require 'maincontent.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Add</title>
   <link rel="stylesheet" href="style.css">
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
            <button id="save-product-btn" onclick="" name="save-product-btn" type="submit">Save</button>
            <button id="cancel-btn" type="submit" formaction="../index.php">Cancel</button>
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
         <p>Scandiweb Test Assignment</p>
      </footer>
   </form>

</body>

</html>