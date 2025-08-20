<?php require_once("../Controladores/loginControlador.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Shakila - Rentas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #fff3f5;
    }
    .navbar-brand {
      font-family: 'Dancing Script', cursive;
      font-size: xx-large;
    }
    .titulo-renta {
      font-size: 2rem;
      margin: 30px 0 20px;
      font-weight: bold;
    }
    .card {
      border-radius: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <!-- <div class="container"> -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="../../index.php">Shakila!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="../../index.php">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="./cliente.php">Clientes</a></li>
            <li class="nav-item"><a class="nav-link" href="./catalogo.php">Catálogo</a></li>
            <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Renta</a></li>
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
        </div>
      </div>
    </nav>
    <h2 class="text-center titulo-renta">Formulario de renta de peliculas</h2>
    
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card p-4 bg-white">
          <form id="rentaForm" method="POST">
            <div class="mb-3">
              <label for="cliente" class="form-label">Cliente</label>
              <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nombre del cliente" required>
            </div>
            <div class="mb-3">
              <label for="pelicula" class="form-label">Película</label>
              <?php
              if(isset($_GET["peli_id"])){
                $peli_id = $_GET["peli_id"];
              }else{
                $peli_id = "";
              }
              echo '<input type="text" class="form-control" id="pelicula" name="pelicula" placeholder="ID de la película" value="'. $peli_id .'" required>';

              ?>
              </input>
            </div>
            <div class="mb-3">
              <label for="fechaRenta" class="form-label">Fecha de Renta</label>
              <input type="date" class="form-control" id="fechaRenta" name="fechaRenta" required>
            </div>
            <div class="mb-3">
              <label for="fechaDevolucion" class="form-label">Fecha de devolucion</label>
              <input type="date" class="form-control" id="fechaDevolucion" name="fechaDevolucion" required>
            </div>
            <div class="mb-3 form-check">
              <input type="checkbox" class="form-check-input" id="devuelta" name="devuelta">
              <label class="form-check-label" for="devuelta">Estoy Alquilando </label>
            </div>
            <button type="submit" class="btn btn-primary w-100" onclick="pete()">Registrar Renta</button>
            <!-- <br>
            <br>
            <input type="button" id="facturin" name="facturin" class="btn btn-warning w-100" value="Ver Factura" onclick="pete()"> -->
          </form>

            <?php
            if(isset($_POST["cliente"]) && isset($_POST["pelicula"]) && isset($_POST["fechaRenta"]) && isset($_POST["fechaDevolucion"]) && isset($_POST["devuelta"])){
              $nombre = $_POST["cliente"];
              $peli = $_POST["pelicula"];
              $fechaida = $_POST["fechaRenta"];
              $fecharegreso = $_POST["fechaDevolucion"];
              $alquilado = $_POST["devuelta"];
              
              $manage = $_SESSION['Manager'];
              if($alquilado = "on"){
                $alquilado = 1;
              }
              else{
                $alquilado = 0;
              }

              include("../conexion.php");
              $consulta = $conexion->query('SELECT * FROM customer WHERE first_name LIKE "' . $nombre . '%" LIMIT 1');
              if ($consulta->num_rows === 0) {
                echo "Cliente no encontrado, intente de nuevo";
              } else {
                echo "Cliente encontrado.";
                $fila = $consulta->fetch_assoc();
                $customer_id = $fila["customer_id"];
                $consulta->free();
                $consulta = $conexion->query("INSERT INTO RENTAL(rental_date, inventory_id, customer_id, return_date, staff_id, alquilado) VALUES('$fechaida',$peli,'$customer_id','$fecharegreso',$manage,'$alquilado')");
              }
            }
            ?>

        </div>
      </div>
    </div>
  <!-- </div> -->
  <div class="modal fade" id="resultadoModal" tabindex="-1" aria-labelledby="resultadoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content rounded-4 shadow">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="resultadoModalLabel">Renta Registrada</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
        </div>
        <div class="modal-body">
          <p><strong>Cliente:</strong> <span id="res-cliente"></span></p>
          <p><strong>Película:</strong> <span id="res-pelicula"></span></p>
          <p><strong>Fecha de Renta:</strong> <span id="res-fechaRenta"></span></p>
          <p><strong>Fecha de Devolución:</strong> <span id="res-fechaDevolucion"></span></p>
          <p><strong>Devuelta:</strong> <span id="res-devuelta"></span></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const form = document.getElementById("rentaForm");
    const modal = new bootstrap.Modal(document.getElementById("resultadoModal"));

     function pete(){
       const cliente = document.getElementById("cliente").value;
       const pelicula = document.getElementById("pelicula").value;
       const fechaRenta = document.getElementById("fechaRenta").value;
       const fechaDevolucion = document.getElementById("fechaDevolucion").value;
       const devuelta = document.getElementById("devuelta").checked ? "Sí" : "No";
 
       document.getElementById("res-cliente").textContent = cliente;
       document.getElementById("res-pelicula").textContent = pelicula;
       document.getElementById("res-fechaRenta").textContent = fechaRenta;
       document.getElementById("res-fechaDevolucion").textContent = fechaDevolucion;
       document.getElementById("res-devuelta").textContent = devuelta;
       modal.show();
     };
  </script>
</body>
</html>