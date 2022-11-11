<?php
require 'ext/db.php';
require 'ext/getitems.php';
require 'ext/showitems.php';
require 'ext/deleteitems.php';
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
            <button id="add-product-btn" type="submit" formaction="ext/add-product.php">ADD</button>
            <button id="delete-product-btn" type="submit" name="MASS DELETE" onclick=" <?php
                                                                                                $erase = new deleteitems();
                                                                                                @$erase->erase(); ?>">
               MASS DELETE</button>
         </div>
      </header>
      <main>
         <div id="main_content">
            <?php
            $show = new showitems();
            @$show->show();
            ?>
         </div>
      </main>
      <footer>
         <p>Scandiweb Test Assignment</p>
      </footer>
   </form>
</body>

</html>