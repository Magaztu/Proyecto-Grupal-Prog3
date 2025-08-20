<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST"){

        if(isset($_POST['tienda1'])){
            $_SESSION['Store'] = 1;
        }

        if(isset($_POST['tienda2'])){
            $_SESSION['Store'] = 2;
        }

        header("Location: ../../index.php");
        exit();
    }
?>