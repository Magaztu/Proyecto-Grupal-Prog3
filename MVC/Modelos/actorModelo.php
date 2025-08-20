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

        // INSERT INTO actor(first_name, last_name) VALUES('Pedrito','Cangu');
        public function addActor($nombre, $apellido){
            if(empty($nombre) || empty($apellido)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("INSERT INTO actor(first_name, last_name) VALUES(?,?);");
            $devolver->bind_param("ss",$nombre,$apellido);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }

        // UPDATE ACTOR SET first_name = 'Pedro' WHERE actor_id = '204';
        // UPDATE ACTOR SET last_name = 'Carnal' WHERE actor_id = '204';
        public function actualizarActor($nombre, $apellido, $id){
           if(empty($nombre) || empty($apellido) || empty($id)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("UPDATE ACTOR SET first_name = ?, last_name = ? WHERE actor_id = ?;");
            $devolver->bind_param("ssi",$nombre,$apellido,$id);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }

        // DELETE FROM actor WHERE actor_id = 204;
        public function eliminarActor($id){
            if(empty($id)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("DELETE FROM actor WHERE actor_id = ?;");
            $devolver->bind_param("i",$id);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }
    }
?>