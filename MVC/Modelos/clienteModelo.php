<?php
    class Cliente{
        private $consulta;

        public function __construct($conexion){
            $this->consulta = $conexion;
        }

        public function obtenerClientes($busqueda){
            if(empty($busqueda)){
            return $this->consulta->query("call mostrar_clientes();");
          }
          else {
            $buscar = $busqueda;
            return $this->consulta->query("call filtrado_cliente('$busqueda');");
          }
        }
    }
?>