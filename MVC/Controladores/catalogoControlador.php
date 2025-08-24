<?php
    include("../Modelos/catalogoModelo.php");
    include("../Vistas/catalogoVista.php");

    class catalogoControlado{
        private $catalogoModelo;
        private $catalogoVista;

        public function __construct($conexion){
            $this->catalogoModelo = new Catalogo($conexion);
            $this->catalogoVista = new catalogoVisto();
        }

        public function catalogo(){
            if (isset($_POST["buscarPelis"])){
                $busqueda = $_POST["buscarPelis"];
            }
            else{
                $busqueda = "";
            }
            $resultado = $this->catalogoModelo->obtenerPeliculas($busqueda);
            return $this->catalogoVista->cataHTML($resultado);
        }
    }
?>