<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shakila - Staff</title>
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
              <li><a class="dropdown-item disabled" href="#">Staff</a></li>
              <li><a class="dropdown-item" href="./actor.php">Actores</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search" method="POST">
          <input id="buscarStaff" name="buscarStaff" class="form-control me-2" type="search" placeholder="Buscar staff" aria-label="Buscar"/>
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
      <h2 class="mb-4">Listado de Staff</h2>
      <button class="btn btn-success slide-btn-hor mb-4" data-bs-toggle="modal" data-bs-target="#Insertar" type="button">&nbsp;Añadir</button>
    </div>
    <div class="row g-4" id="staffList">

      <!-- Staff 1 -->
      <!-- <div class="col-12 staff-card">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://randomuser.me/api/portraits/men/44.jpg" alt="Staff 1" class="mb-3">
            <h5 class="card-title">Carlos Medina</h5>
            <p class="card-text">Gerente de tienda en Lima</p>
            <a href="#" class="btn btn-warning">Contactar</a>
          </div>
        </div>
      </div> -->

      <!-- Staff 2 -->
      <!-- <div class="col-12 staff-card">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://randomuser.me/api/portraits/women/30.jpg" alt="Staff 2" class="mb-3">
            <h5 class="card-title">Sofía Torres</h5>
            <p class="card-text">Atención al cliente</p>
            <a href="#" class="btn btn-warning">Correo</a>
          </div>
        </div>
      </div> -->

      <?php
        include("../conexion.php");
          include("../Controladores/staffControlador.php");
          $controlado = new staffControlado($conexion);
          echo $controlado->staff();
      ?>

      <div class="modal fade" id="Actualizar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar Staff</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
              <input type="hidden" name="update_id" id="update_id">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nombre_u" class="form-label">Nombre:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="nombre_u" name="nombre_u">
                </div>
                <div class="mb-3">
                  <label for="apellido_u" class="form-label">Apellido:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="apellido_u" name="apellido_u">
                </div>
                <div class="mb-3">
                  <label for="usuario_u" class="form-label">Usuario:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="usuario_u" name="usuario_u">
                </div>
                <div class="mb-3">
                  <label for="contra_u" class="form-label">Contraseña:</label>
                  <input type="password" style="background-color:#FFFFFF; color:black" class="form-control" id="contra_u" name="contra_u">
                </div>
                <div class="mb-3">
                  <label for="correo_u" class="form-label">Correo Electrónico:</label>
                  <input type="email" style="background-color:#FFFFFF; color:black" class="form-control" id="correo_u" name="correo_u">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="Actualizar" class="btn btn-primary">Actualizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="modal fade" id="Insertar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Añadir Staff</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nombre_a" class="form-label">Nombre:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="nombre_a" name="nombre_a">
                </div>
                <div class="mb-3">
                  <label for="apellido_a" class="form-label">Apellido:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="apellido_a" name="apellido_a">
                </div>
                <div class="mb-3">
                  <label for="usuario_a" class="form-label">Usuario:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="usuario_a" name="usuario_a">
                </div>
                <div class="mb-3">
                  <label for="contra_a" class="form-label">Contraseña:</label>
                  <input type="password" style="background-color:#FFFFFF; color:black" class="form-control" id="contra_a" name="contra_a">
                </div>
                <div class="mb-3">
                  <label for="correo_a" class="form-label">Correo Electrónico:</label>
                  <input type="email" style="background-color:#FFFFFF; color:black" class="form-control" id="correo_a" name="correo_a">
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" name="Insertar" class="btn btn-success">Insertar</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  const modal = document.getElementById('Actualizar');
  modal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const actorId = button.getAttribute('data-actorid');
    modal.querySelector('#update_id').value = actorId;
  });


</script>
</html>
