<?php

//Validación
include("../conexion.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario = $_POST["usuario"];
    $clave = $_POST["clave"];

    $ACCESO = $conexion->prepare("call validacion_staff(?,?)");
    $ACCESO->bind_param("ss",$usuario,$clave);
    $ACCESO->execute();

    $resultados = $ACCESO->get_result();
    $fila = $resultados->fetch_row(); //Este es el que no devuelve nadota nada nadita, solo un array indexado 

    if ($fila[0] == 1) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION['logged_in'] = true;
        header("Location: ./tienda.php"); // o cualquier página inicial
        exit();
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>