<?php require_once("../Controladores/loginControlador.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Catálogo de Películas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <style>
    .movie-card { transition: transform 0.3s ease; }
    .movie-card:hover { transform: scale(1.05); }
    .movie-title { font-weight: bold; }
    .card-body { min-height: 180px; display: flex; flex-direction: column; justify-content: space-between; }
    .modal-poster { max-height: 400px; object-fit: contain; }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
    <div class="container-fluid">
      <a style="font-family: 'Dancing Script', cursive; font-size: xx-large;" class="navbar-brand" href="../../index.php">Shakila!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li>
          <li class="nav-item"><a class="nav-link" href="./cliente.php">Clientes</a></li>
          <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Catálogo</a></li>
          <li class="nav-item"><a class="nav-link" href="./renta.php">Renta</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Gestión
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./tienda.php">Seleccionar Tienda </a></li>
            <li><hr class="dropdown-divider disabled"></li>
            <li><a class="dropdown-item" href="./staff.php">Staff</a></li>
            <li><a class="dropdown-item" href="./actor.php">Actores</a></li>
          </ul>
        </li>
        </ul>
        <form class="d-flex" role="search" method="post" action="">
          <input name="buscarPelis" id="buscarPelis" class="form-control me-2" type="search" placeholder="Buscar películas" aria-label="Search">
          <button class="btn btn-outline-danger" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="mb-4">Catálogo de Películas</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

      <!-- Iteraciones otrabes -->
      <?php
        include("../conexion.php");
        include("../Controladores/catalogoControlador.php");
        $controladito = new catalogoControlado($conexion);
        echo $controladito->catalogo();

      ?>

    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>