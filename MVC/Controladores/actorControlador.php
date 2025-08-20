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

            $completado = FALSE;
            
            if (isset($_POST["nombre_a"]) && isset($_POST["apellido_a"])){
                $nom = $_POST["nombre_a"];
                $ape = $_POST["apellido_a"];

                $completado = $this->actorModelo->addActor($nom,$ape);
            }

            if (isset($_POST["nombre_u"]) && isset($_POST["apellido_u"]) && isset($_POST["update_id"])){
                $nom = $_POST["nombre_u"];
                $ape = $_POST["apellido_u"];
                $i = $_POST["update_id"];

                $completado = $this->actorModelo->actualizarActor($nom,$ape,$i);
            }

            if (isset($_POST["delete_id"])){
                $i = $_POST["delete_id"];

                $completado = $this->actorModelo->eliminarActor($i);
            }
            
            $resultado = $this->actorModelo->obtenerActores($busqueda);
    
            return $this->actorVista->htmlActores($resultado, $completado);
        }
    }
?>