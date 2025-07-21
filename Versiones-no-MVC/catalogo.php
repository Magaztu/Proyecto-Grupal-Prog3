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

      <!-- Barbie -->
      <!-- <div class="col">
        <div class="card movie-card h-100">
          <img src="https://image.tmdb.org/t/p/w500/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg" class="card-img-top" alt="Barbie">
          <div class="card-body">
            <h5 class="movie-title">Barbie</h5>
            <p class="card-text">Género: Comedia / Fantasía</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#barbieModal">Ver más</button>
          </div>
        </div>
      </div> -->

      <?php
        include("../conexion.php");

        if(empty($_POST["buscarPelis"])){
            $buscar = "";
            $consulta = $conexion->query("call busqueda_titulo('$buscar');");
          }
          else {
            $buscar = $_POST["buscarPelis"];
            $consulta = $conexion->query("call busqueda_titulo('$buscar');");
          }
          $contador = 1;

          while($fila = $consulta->fetch_assoc()){
  
            $titulo_pelicula = $fila["title"];
            $id = $fila["film_id"];
            $duracion = $fila["tiempo_total"];
            $categoria_pelicula = $fila["categoria"];
            $descripcion = $fila["description"];
            $rating = $fila["rating"];
            $contador++; //Paara identificar los modals
            // $consulta->free(); // Limpia la conexión para que pueda llamar de nuevo


            // $actores = "";
            // $consulta_2 = $conexion->query("call busqueda_actores('$titulo_pelicula')");
            // while($row = $consulta_2->fetch_assoc()){
            //   $actores = $actores . $row["actores"] . " | ";
            //   $consulta_2->free();
            // }
            $datos = "https://picsum.photos/200/300?grayscale&random=" . rand(1, 100);
            if(@getimagesize($datos)){ //@ Evita que salgan mensajes de warning, cualquier respuesta se toma como si la imagen cargóe xitosamente 
              $foto = $datos;
            }
            else{
              $foto = "../../recursos-e-imágenes/defaultpfp.png";
            }
            echo '
            <div class="col">
              <div class="card movie-card h-100">
                <img src="'. $foto . '" class="card-img-top" alt="Barbie">
                <div class="card-body">
                  <h5 class="movie-title">' . $titulo_pelicula . '</h5>
                  <p class="card-text">Género: ' . $categoria_pelicula . '</p>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#' . $contador .'Modal">Ver más</button>
                </div>
              </div>
            </div>
            ';

            echo '
            <div class="modal fade" id="'. $contador .'Modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">' . $titulo_pelicula . '</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-md-4">
                      <img src="' . $foto . '" class="img-fluid modal-poster" alt="Barbie">
                    </div>
                    <div class="col-md-8">
                      <p><strong>Género:</strong> '. $categoria_pelicula .'</p>
                      <p><strong>Sinopsis:</strong> '. $descripcion .'</p>
                      <p><strong>Duración:</strong> '. $duracion .'</p>
                      <p><strong>Rating:</strong> '. $rating .'</p>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <form action="./renta.php" method="get">
                    <input type="hidden" name="peli_id" id="peli_id" value="'. $id .'">
                    <button type="submit" class="btn btn-success">Rentar</button>
                  </form>
                </div>
                </div>
              </div>
            </div>
            ';

          }

      ?>

    </div>
  </div>
  <!-- Modales -->
  <!-- Modal Barbie -->
  <!-- <div class="modal fade" id="barbieModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Barbie (2023)</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <img src="https://image.tmdb.org/t/p/w500/iuFNMS8U5cb6xfzi51Dbkovj7vM.jpg" class="img-fluid modal-poster" alt="Barbie">
            </div>
            <div class="col-md-8">
              <p><strong>Género:</strong> Comedia, Fantasía</p>
              <p><strong>Director:</strong> Greta Gerwig</p>
              <p><strong>Reparto:</strong> Margot Robbie, Ryan Gosling, America Ferrera</p>
              <p><strong>Sinopsis:</strong> Barbie vive en Barbieland donde todo es perfecto, hasta que un día comienza a cuestionar su existencia y parte al mundo real en un viaje de autodescubrimiento.</p>
              <p><strong>Duración:</strong> 1h 54m</p>
              <p><strong>Calificación:</strong> ★★★★☆</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Rentar</button>
        </div>
      </div>
    </div>
  </div> -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>