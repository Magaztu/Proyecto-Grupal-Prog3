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
    <div class="d-grid gap-2 d-md-flex justify-content-md-between">
      <h2 class="mb-4">Listado de Actores</h2>
      <button class="btn btn-success slide-btn-hor mb-4" data-bs-toggle="modal" data-bs-target="#Insertar" type="button">&nbsp;Añadir</button>
    </div>
    <div class="row g-4" id="actoresList">

      <!-- Actor 1 -->
      <!-- <div class="col-md-6 actor-card">
        <div class="card text-center">
          <div class="card-body">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Actor 1" class="mb-3">
            <h5 class="card-title">Juan Pérez</h5>
            <p class="card-text">Actor principal desde 2020</p>
            <a href="#" class="btn btn-warning">Contactar</a>
          </div>
        </div>
      </div> -->

      <!-- Actor 2 -->
      <!-- <div class="col-md-6 actor-card">
        <div class="card text-center">
          <div class="card-body">
            <form action="" method="post">
            <div class="d-grid gap-2 d-md-flex justify-content-md-between"> -->
              <!-- Código prestado de los otros compañeros para activar un modal -->
                <!-- <button class="btn btn-primary slide-btn" data-actorid="ACTOR_ID" data-bs-toggle="modal" data-bs-target="#Actualizar" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="button">Actualizar</button>
                <input type="hidden" name="delete_id" value="ACTOR_ID">
                <button class="btn btn-danger slide-btn" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" type="submit">Eliminar</button>
              </div>
            </form>
            <img src="https://randomuser.me/api/portraits/women/52.jpg" alt="Actor 2" class="mb-3">
            <h5 class="card-title">Lucía Ramírez</h5>
            <p class="card-text">Especialista en comedia</p>
            <a href="#" class="btn btn-warning">Contactar</a>
          </div>
        </div>
      </div> -->

      <?php
        include("../conexion.php");
          include("../Controladores/actorControlador.php");
          $controlado = new actorControlado($conexion);
          echo $controlado->actores();
      ?>

      <div class="modal fade" id="Actualizar" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Actualizar Actor</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
              <input type="hidden" name="update_id" id="update_id">
              <div class="modal-body">
                <div class="mb-3">
                  <label for="nombre_u" class="form-label">Nombre:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="nombre_a" name="nombre_a">
                </div>
                <div class="mb-3">
                  <label for="apellido_u" class="form-label">Apellido:</label>
                  <input type="text" style="background-color:#FFFFFF; color:black" class="form-control" id="apellido_a" name="apellido_a">
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
              <h5 class="modal-title">Añadir Actor</h5>
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

  <div class="toast-container position-fixed bottom-0 end-0 p-3" style="z-index: 1055;">
  <div id="liveToast" class="toast align-items-center text-bg-primary border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
    <div class="d-flex">
      <div class="toast-body d-flex align-items-center gap-2">
        <i class="bi bi-check-circle-fill fs-5"></i>
        <span>Correo de contacto enviado con éxito.</span>
      </div>
      <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Cerrar"></button>
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

  // No quería usar JS pero no quedaba de otra para envíar el id al modal con form sin usar un submit ni imprimir un modal para cada card
  // Este eventlistener espera a que se despliegue el modal y luego envia el valor que almacena el atributo data-actorid del boton que haya activado el modal
  //luego se selecciona el input con el id "update_id" y se le asigna como valor el id antes recogido.

  document.querySelectorAll('.liveToastBtn').forEach(button => {
    button.addEventListener('click', () => {
      const toastEl = document.getElementById('liveToast');
      const toast = bootstrap.Toast.getOrCreateInstance(toastEl);
      toast.show();
    });
  });


</script>
</html>
