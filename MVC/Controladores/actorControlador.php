<?php
    include("../Modelos/actorModelo.php");
    include("../Vistas/actorVista.php");

    class actorControlado{
        private $actorModelo;
        private $actorVista;

        public function __construct($conectar){
            $this->actorModelo = new Actor($conectar);
            $this->actorVista = new ActorVisto();
        }

        public function actores(){
            if (isset($_POST["buscarActor"])){
                $busqueda = $_POST["buscarActor"];
            }
            else{
                $busqueda = "";
            }
            $resultado = $this->actorModelo->obtenerActores($busqueda);

           return $this->actorVista->htmlActores($resultado);
        }
    }
?>