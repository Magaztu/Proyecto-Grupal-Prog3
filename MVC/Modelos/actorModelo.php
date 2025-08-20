<?php
    class Actor{
        private $consulta;

        public function __construct($conexion){
            $this->consulta = $conexion;
        }

        public function obtenerActores($busqueda){
            if(empty($busqueda)){
            return $this->consulta->query("call mostrar_actores();");
          }
          else {
            $buscar = $busqueda;
            return $this->consulta->query("call filtrado_actor('$busqueda');");
          }
        }
    }
?>