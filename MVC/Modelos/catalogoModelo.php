<?php
    class Catalogo{
        private $consulta;

        public function __construct($conexion){
            $this->consulta = $conexion;
        }

        public function obtenerPeliculas($busqueda){
            if(empty($busqueda)){
            $buscar = "";
            return $this->consulta->query("call busqueda_titulo('$buscar');");
          }
          else {
            $buscar = $busqueda;
            return $this->consulta->query("call busqueda_titulo('$buscar');");
          }
        }
    }
?>