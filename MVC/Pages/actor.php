<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shakila - Actores</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../recursos-e-imágenes/tema-oscuro.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="../../index.php">Shakila!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./cliente.php">Clientes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./catalogo.php">Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./renta.php">Renta</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gestión
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="./tienda.php">Seleccionar Tienda</a></li>
              <li><hr class="dropdown-divider disabled"></li>
              <li><a class="dropdown-item" href="./staff.php">Staff</a></li>
              <li><a class="dropdown-item disabled" href="#">Actores</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" method="POST">
          <input id="buscarActor" name="buscarActor" class="form-control me-2" type="search" placeholder="Buscar actores" aria-label="Buscar"/>
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <h2 class="mb-4">Listado de Actores</h2>
    <div class="row g-4" id="actoresList">

      <!-- Actor 1 -->
      <div class="col-md-6 actor-card">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Actor 1" class="mb-3">
            <h5 class="card-title">Juan Pérez</h5>
            <p class="card-text">Actor principal desde 2020</p>
            <a href="#" class="btn btn-warning">Contactar</a>
          </div>
        </div>
      </div>

      <!-- Actor 2 -->
      <div class="col-md-6 actor-card">
        <div class="card text-center">
          <div class="card-body">
            <div class="d-grid gap-2 d-md-flex justify-content-md-between">
              <button class="btn btn-primary" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="button">Actualizar</button>
              <button class="btn btn-danger" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="button">Eliminar</button>
            </div>
            <img src="https://randomuser.me/api/portraits/women/52.jpg" alt="Actor 2" class="mb-3">
            <h5 class="card-title">Lucía Ramírez</h5>
            <p class="card-text">Especialista en comedia</p>
            <a href="#" class="btn btn-warning">Contactar</a>
          </div>
        </div>
      </div>

      <?php
        $lol = "";
      ?>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
