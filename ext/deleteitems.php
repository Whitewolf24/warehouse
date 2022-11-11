<?php

// Class for deleting marked items //
class deleteitems extends showitems
{
    public function erase()
    {
        $conn = $this->connect();
        if (isset($_POST['delete-product-btn'])) {
            $num = count($_POST['id']);
            $i = 0;
            while ($i < $num) {
                $del = $_POST['id'][$i];
                mysqli_query($conn, "DELETE FROM stock WHERE ID ='$del'");
                $i++;
            }
            header("Location:index.php");
            $conn->close();
        }
    }
}
