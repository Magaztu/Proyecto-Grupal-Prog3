<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shakila - Tiendas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../recursos-e-imágenes/tema-oscuro.css">
</head>

<style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
      background: linear-gradient(to right, #ffffff, #121212);
    }

    .store-select-container {
      display: flex;
      margin-top: 75px;
    }

    .store-box {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      padding: 20px;
    }

    .store-image {
      width: 80%;
      max-width: 400px;
      height: auto;
      border-radius: 8px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
      transition: transform 0.3s ease;
    }

    .store-box:hover .store-image {
      transform: scale(1.03);
    }

    .store-box h2, .store-box h5 {
      margin-top: 20px;
      text-align: center;
    }

    .store-light h2, .store-light h5 {
      color: #000;
    }

    .store-dark h2, .store-dark h5 {
      color: #fff;
    }

</style>

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
              <li><a class="dropdown-item" href="#">Seleccionar Tienda</a></li>
              <li><hr class="dropdown-divider disabled"></li>
              <li><a class="dropdown-item" href="./staff.php">Staff</a></li>
              <li><a class="dropdown-item disabled" href="./actor.php">Actores</a></li>
            </ul>
          </li>
        </ul>
          <a href="../../fewfwe.html" class="btn btn-outline-warning">. . .</a>
      </div>
    </div>
  </nav>

  <div class="store-select-container">
    <form method="POST" action="" class="store-box store-light" style="background-color: transparent;">
      <button type="submit" name="tienda1" value="tienda1" class="bg-transparent border-0 p-0 text-center">
        <img src="../../recursos-e-imágenes/M-side.png" alt="Tienda 1" class="store-image">
        <h2>M - Store</h2>
        <h5>Yahoo</h5>
      </button>
    </form>

    <form method="POST" action="" class="store-box store-dark" style="background-color: transparent;">
      <button type="submit" name="tienda2" value="tienda2" class="bg-transparent border-0 p-0 text-center">
        <img src="../../recursos-e-imágenes/l-side.png" alt="Tienda 2" class="store-image">
        <h2>L - Store</h2>
        <h5>Wahoo</h5>
      </button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
