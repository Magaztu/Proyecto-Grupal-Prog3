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
            $resultado = $this->clienteModelo->obtenerClientes($busqueda);

           return $this->clienteVista->htmlClientes($resultado);
        }
    }
?>