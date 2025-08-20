<?php

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
        header("Location: ./tienda.php"); // o cualquier página inicial
        exit();
    } else {
        $error = "Credenciales incorrectas";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Shakila - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-dark text-white">
  <form method="POST" class="p-4 rounded bg-secondary" style="min-width:300px;">
    <h2 class="mb-3 text-center">Iniciar Sesión</h2>

    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <div class="mb-3">
      <label for="usuario" class="form-label">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="mb-3">
      <label for="clave" class="form-label">Contraseña</label>
      <input type="password" class="form-control" id="clave" name="clave" required>
    </div>
    <button type="submit" class="btn btn-warning w-100">Entrar</button>
  </form>
</body>
</html>
