<?php
    include("../Modelos/staffModelo.php");
    include("../Vistas/staffVista.php");

    class staffControlado{
        private $staffModelo;
        private $staffVista;

        public function __construct($conectar){
            $this->staffModelo = new Staff($conectar);
            $this->staffVista = new staffVisto();
        }

        public function staff(){
            if (isset($_POST["buscarStaff"])){
                $busqueda = $_POST["buscarStaff"];
            }
            else{
                $busqueda = "";
            }

            $completado = FALSE;
            
            if (isset($_POST["nombre_a"]) && isset($_POST["apellido_a"]) && isset($_POST["usuario_a"]) && isset($_POST["contra_a"]) && isset($_POST["correo_a"])){
                $nom = $_POST["nombre_a"];
                $ape = $_POST["apellido_a"];
                $user = $_POST["usuario_a"];
                $pass = $_POST["contra_a"];
                $cor = $_POST["correo_a"];

                $completado = $this->staffModelo->addStaff($nom,$ape,$user,$pass,$cor);
            }

            if (isset($_POST["nombre_u"]) && isset($_POST["apellido_u"]) && isset($_POST["usuario_u"]) && isset($_POST["contra_u"]) && isset($_POST["correo_u"]) && isset($_POST["update_id"])){
                $nom = $_POST["nombre_u"];
                $ape = $_POST["apellido_u"];
                $user = $_POST["usuario_u"];
                $pass = $_POST["contra_u"];
                $cor = $_POST["correo_u"];
                $i = $_POST["update_id"];

                $completado = $this->staffModelo->actualizarStaff($nom,$ape,$user,$pass,$cor,$i);
            }

            if (isset($_POST["delete_id"])){
                $i = $_POST["delete_id"];

                $completado = $this->staffModelo->eliminarStaff($i);
            }
            
            $resultado = $this->staffModelo->obtenerStaff($busqueda);
    
            return $this->staffVista->htmlStaff($resultado, $completado);
        }
    }
?>