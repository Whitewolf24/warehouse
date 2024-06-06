<?php

// Class for deleting marked items //
class deleteitems extends getitems
{
    public function erase()
    {
        $num = $_POST['id'];

        foreach ($num as $id) {
            $sql = "DELETE FROM stock WHERE ID ='$id'";
            $stmt = $this->connect()->query($sql);
            $stmt->execute();
        }
?>
        <script>
            window.location.href = "../index.php";
        </script>
        <!-- header("Location: ../index.php"); -->
<?php
    }
}
