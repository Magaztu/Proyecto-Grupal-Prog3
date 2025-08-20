<?php
    include("../Modelos/clienteModelo.php");
    include("../Vistas/clienteVista.php");

    class clienteControlado{
        private $clienteModelo;
        private $clienteVista;

        public function __construct($conectar){
            $this->clienteModelo = new Cliente($conectar);
            $this->clienteVista = new ClienteVisto();
        }

        public function clientes(){
            if (isset($_POST["buscarCliente"])){
                $busqueda = $_POST["buscarCliente"];
            }
            else{
                $busqueda = "";
            }

            $completado = FALSE;

            if (isset($_POST["nombre_a"]) && isset($_POST["apellido_a"]) && isset($_POST["correo_a"])){
                $nom = $_POST["nombre_a"];
                $ape = $_POST["apellido_a"];
                $cor = $_POST["correo_a"];

                $completado = $this->clienteModelo->addCliente($nom,$ape,$cor);
            }

            if (isset($_POST["nombre_u"]) && isset($_POST["apellido_u"]) && isset($_POST["update_id"]) && isset($_POST["correo_u"])){
                $nom = $_POST["nombre_u"];
                $ape = $_POST["apellido_u"];
                $i = $_POST["update_id"];
                $cor = $_POST["correo_u"];

                $completado = $this->clienteModelo->actualizarCliente($nom,$ape,$cor,$i);
            }

            if (isset($_POST["delete_id"])){
                $i = $_POST["delete_id"];

                $completado = $this->clienteModelo->eliminarCliente($i);
            }

            $resultado = $this->clienteModelo->obtenerClientes($busqueda);

            return $this->clienteVista->htmlClientes($resultado, $completado);
        }
    }
?>