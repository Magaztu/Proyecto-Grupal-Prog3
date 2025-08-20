<?php
    //En realidad esto no es un controlador jijijiijijiijji
    //Prohibe la entrada
    session_start();
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== TRUE){
        header("location:../Pages/login.php");
        exit();
    }
?>