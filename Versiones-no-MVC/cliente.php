<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sakila - Rentas y Ventas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .navbar-brand {
      font-family: 'Dancing Script', cursive;
      font-size: xx-large;
    }
    .client-card img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 50%;
    }
    .client-card {
      transition: transform 0.2s ease;
    }
    .client-card:hover {
      transform: scale(1.02);
    }
  </style>
</head>
<body>
  <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-4">
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
              <a class="nav-link active" aria-current="page" href="#">Clientes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./catalogo.php">Catálogo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./renta.php">Renta</a>
            </li>
          </ul>
          <form class="d-flex" role="search" method="POST">
            <input id="buscarCliente" name="buscarCliente" class="form-control me-2" type="search" placeholder="Buscar clientes" aria-label="Buscar"/>
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row" id="clientesList">
        <h2 class="mb-4">Registro de Clientes</h2>
        <!-- Cliente 1 -->
        <!-- <div class="col-md-4 mb-4 client-card" data-name="ana gomez">
          <div class="card text-center">
            <div class="card-body">
              <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Ana" class="mb-3">
              <h5 class="card-title">Ana Gómez</h5>
              <p class="card-text">Cliente frecuente desde 2021</p>
              <a href="#" class="btn btn-success">Ver perfil</a>
            </div>
          </div>
        </div> -->
        
        <!-- Iteraciones -->
        <?php
          include("../conexion.php");
        
          if(empty($_POST["buscarCliente"])){
            $consulta = $conexion->query("call mostrar_clientes();");
          }
          else {
            $buscar = $_POST["buscarCliente"];
            $consulta = $conexion->query("call filtrado_cliente('$buscar');");
          }
          // for($i = 0; $i <24; $i++){
          while($fila = $consulta->fetch_assoc()){ //como un cursor, va bajando solo de indices y devuelve el valor de una fila, cuando se acaba da FALSO
  
          //NOTA: También existe el método fetch_row() que devuelve un array con índices en vez del nombre de la columna.
  
            $nombre_cliente = $fila["nombres_clientes"];
            $correo_cliente = $fila["email"];
            $llamada = file_get_contents('https://randomuser.me/api/'); //El file_get_contents solo coge el JSON de la api
            $datos = json_decode($llamada, true); //Se transforma en un array
            if(isset($datos['results'][0]['picture']['medium'])){ //Preguntando si la imagen llegó
              $foto = $datos['results'][0]['picture']['medium']; //El JSON tiene JSONs dentro de sí, por eso se llama como array con arrays
            }
            else{
              $foto = "../../recursos-e-imágenes/defaultpfp.png";
            } // La API no parece ser de alta disponibilidad y a veces se cae, por eso el default foto pfp
            echo '
            
            <div class="col-md-4 mb-4 client-card" data-name="carla fernandez">
            <div class="card text-center">
              <div class="card-body">
                <img src="'. $foto .'" alt="cualquier_pibe" class="mb-3">
                <h5 class="card-title">'. $nombre_cliente .'</h5>
                <p class="card-text">'. $correo_cliente .'</p>
                <a href="#" class="btn btn-success">Ver perfil</a>
              </div>
            </div>
          </div>
            
            ';
          }
        ?>
  
      </div>
    </div>
  <!-- </div> -->

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script>
    const searchInput = document.getElementById('searchInput');
    const clientCards = document.querySelectorAll('.client-card');

    searchInput.addEventListener('input', () => {
      const searchValue = searchInput.value.toLowerCase();

      clientCards.forEach(card => {
        const name = card.getAttribute('data-name');
        if (name.includes(searchValue)) {
          card.style.display = 'block';
        } else {
          card.style.display = 'none';
        }
      });
    });
  </script> -->
</body>
</html>
