<?php
    include("../Modelos/clienteModelo.php");

    class clienteControlado{
        private $clienteModelo;

        public function __construct($conectar){
            $this->clienteModelo = new Cliente($conectar);
        }

        public function clientes(){
            if (isset($_POST["buscarCliente"])){
                $busqueda = $_POST["buscarCliente"];
            }
            else{
                $busqueda = "";
            }
            $resultado = $this->clienteModelo->obtenerClientes($busqueda);

            $html = ""; //Este va a contener un bloque de código html para mandar a la vista

            while($fila = $resultado->fetch_assoc()){ //como un cursor, va bajando solo de indices y devuelve el valor de una fila, cuando se acaba da FALSO
  
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
            $concatenar = '
            
            <div class="col-md-4 mb-4 client-card" data-name="carla fernandez">
            <div class="card text-center">
              <div class="card-body">
                <img src="'. $foto .'" alt="cualquier_pibe" class="mb-3">
                <h5 class="card-title">'. $nombre_cliente .'</h5>
                <p class="card-text">'. $correo_cliente .'</p>
                <a href="../../fewfwe.html" class="btn btn-success">Ver perfil</a>
              </div>
            </div>
          </div>
            
            ';
            $html = $html . $concatenar;
        }

        return $html;
        }
    }
?>