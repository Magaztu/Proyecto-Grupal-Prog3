<?php
    $host = "localhost";
    $usuario = "shakila_usuario";
    $contraseña = "shakila_password";
    $bd = "sakila";

    $conexion = new mysqli($host,$usuario,$contraseña,$bd);
    //Aquí debería incluir una validación pero no usaré try catch.

?>