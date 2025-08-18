<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sakila - Rentas y Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a style="font-family: 'Dancing Script', cursive; font-size: xx-large;" class="navbar-brand" href="./index.php">Shakila!</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./MVC/Pages/cliente.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./MVC/Pages/catalogo.php">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./MVC/Pages/renta.php">Renta</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administración
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./MVC/Pages/tienda.php">Seleccionar Tienda </a></li>
            <li><hr class="dropdown-divider disabled"></li>
            <li><a class="dropdown-item" href="#">Staff</a></li>
            <li><a class="dropdown-item" href="#">Actores</a></li>
          </ul>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li> -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>    -->
        <!-- <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li> -->
      </ul>
      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Buscar películas" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Buscar</button>
      </form> -->
    </div>
  </div>
  </nav>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12" style="padding: 0; margin: 0;">
        <img src="./recursos-e-imágenes/imagendurisima.png" alt="imagen de mario y luigi pero asi bien dura" width="100%" height="500px">
      </div>
    </div>
  </div>
  <div class="bg-light py-5" style="background: linear-gradient(to right, #dfe9f3 0%, white 100%);"> 
    <!-- //Esto lo leí en w3schools chavito -->
  <div class="container">
    <div class="row align-items-center">

      <div class="col-md-6 text-center text-md-start mb-4 mb-md-0">
        <h1 class="display-5 fw-bold">Base de datos <span style="font-family: 'Dancing Script', cursive; font-size: 50px;">Shakila!</span></h1>
        <p class="lead">
          Shakila está construido por encima de la base de datos "Sakila", a continuación podrás acceder a algunos de sus datos a través de la web.
        </p>
      </div>

      <div class="col-md-3">
        <div class="bg-white shadow-sm rounded p-4">
          <h5 class="mb-3">Tecnologías usadas:</h5>
          <ul class="list-unstyled">
            <li>🐥 HTML5</li>
            <li>🐧 CSS3</li>
            <li>🐥 JavaScript</li>
            <li>🐧 PHP</li>
          </ul>
        </div>
      </div>
      <div class="col-md-3">
        <div class="bg-white shadow-sm rounded p-4">
          <h5 class="mb-3">Contenido disponible:</h5>
          <ul class="list-unstyled">
            <li>🍋 Clientes</li>
            <li>🍋‍🟩 Rentas</li>
            <li>🍋 Películas</li>
          </ul>
        </div>
      </div>
      <!-- No parece que haya problemas con los emojis, quise usar imágenes pequeñas en SVG pero esto es más sencillo -->
    </div>
  </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</html>