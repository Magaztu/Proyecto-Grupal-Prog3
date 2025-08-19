<?php
    include("../Modelos/catalogoModelo.php");

    class catalogoControlado{
        private $catalogoModelo;

        public function __construct($conexion){
            $this->catalogoModelo = new Catalogo($conexion);
        }

        public function catalogo(){
            if (isset($_POST["buscarPelis"])){
                $busqueda = $_POST["buscarPelis"];
            }
            else{
                $busqueda = "";
            }
            $resultado = $this->catalogoModelo->obtenerPeliculas($busqueda);

            $contador = 1;
            $html = "";

            while($fila = $resultado->fetch_assoc()){
    
                $titulo_pelicula = $fila["title"];
                $id = $fila["inventory_id"];
                $duracion = $fila["tiempo_total"];
                $categoria_pelicula = $fila["categoria"];
                $descripcion = $fila["description"];
                $rating = $fila["rating"];
                $alquilado = $fila["alquilado"];

                if ($alquilado == "0"){
                    $mensajito = "No alquilado, disponible.";
                    $mensajito_2 = "";
                }
                else{
                    $mensajito = "Alquilado, no disponible.";
                    $mensajito_2 = "ALQUILADO";
                }
                $contador++; //Paara identificar los modals

                // $datos = "https://picsum.photos/200/300?grayscale&random=" . rand(1, 100);
                // if(@getimagesize($datos)){ //@ Evita que salgan mensajes de warning, cualquier respuesta se toma como si la imagen cargóe xitosamente 
                // $foto = $datos;
                // }
                // else{
                $foto = "../../recursos-e-imágenes/defaultpfp.png";
                // }
                $cartel = '
                <div class="col">
                <div class="card movie-card h-100">
                    <img src="'. $foto . '" class="card-img-top" alt="Barbie">
                    <div class="card-body">
                    <h5 class="movie-title">' . $titulo_pelicula . '</h5>
                    <p class="card-text">Género: ' . $categoria_pelicula . '</p>
                    <p class="card-text">' . $mensajito_2 . '</p>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#' . $contador .'Modal">Ver más</button>
                    </div>
                </div>
                </div>
                ';

                $html = $html . $cartel;

                $modal = '
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
                        <p><strong>Estado de Alquiler:</strong> '. $mensajito .'</p>
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
                $html = $html . $modal;
            }
            return $html;
        }
    }
?>