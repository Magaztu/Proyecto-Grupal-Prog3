<?php
    include("../Modelos/loginModelo.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Shakila - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
</head>

<style>
    body::before {
      content: "";
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: url('../../recursos-e-imágenes/bg.jpg') no-repeat center center;
      background-size: cover;
      z-index: -1;
      opacity: 0.2;
    }
  </style>

<body class="d-flex justify-content-center align-items-center vh-100 bg-dark text-white">
  <form method="POST" class="p-4 rounded bg-secondary" style="min-width:300px;">
    <h3 class="mb-3 text-center" style="font-family: Bungee, sans-serif">Iniciar Sesión en Shakila</h3>
    <hr>

    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

    <div class="mb-3">
      <label for="usuario" class="form-label" style="font-family: Bungee, sans-serif">Usuario</label>
      <input type="text" class="form-control" id="usuario" name="usuario" required>
    </div>
    <div class="mb-3">
      <label for="clave" class="form-label" style="font-family: Bungee, sans-serif">Contraseña</label>
      <input type="password" class="form-control" id="clave" name="clave" required>
    </div>
    <button type="submit" class="btn btn-warning w-100" style="font-family: Bungee, sans-serif">Entrar</button>
  </form>
</body>
</html>
