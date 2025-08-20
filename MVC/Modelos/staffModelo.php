<?php
    class Staff{
        private $consulta;

        public function __construct($conexion){
            $this->consulta = $conexion;
        }

        public function obtenerStaff($busqueda){
            if(empty($busqueda)){
            return $this->consulta->query("call mostrar_staff();");
          }
          else {
            $buscar = $busqueda;
            return $this->consulta->query("call filtrado_staff('$busqueda');");
          }
        }

        // INSERT INTO staff(first_name, last_name, username, password, email, address_id, store_id) VALUES('Lui','gi','Lu','Luigi','lui@gi.ma',9,1);
        public function addStaff($nombre, $apellido, $usuario, $contra, $correo){
            if(empty($nombre) || empty($apellido) || empty($usuario) || empty($contra) || empty($correo)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("INSERT INTO staff(first_name, last_name, username, password, email, address_id, store_id) VALUES(?,?,?,?,?,9,?);");
            $devolver->bind_param("sssssi",$nombre,$apellido, $usuario, $contra, $correo, $_SESSION['Store']);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }

        //UPDATE STAFF SET first_name = "Gustavo", last_name = "Perroni", username = "Guspe", password = "123", email = "hola@peru.pe" WHERE staff_id = 7;
        public function actualizarStaff($nombre, $apellido, $usuario, $contra, $correo, $id){
           if(empty($nombre) || empty($apellido) || empty($id) || empty($usuario) || empty($contra) || empty($correo)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("UPDATE STAFF SET first_name = ?, last_name = ?, username = ?, password = ?, email = ? WHERE staff_id = ?;");
            $devolver->bind_param("sssssi",$nombre,$apellido,$usuario,$contra,$correo,$id);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }

        // DELETE FROM STAFF WHERE staff_id =5;
        public function eliminarStaff($id){
            if(empty($id)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("DELETE FROM STAFF WHERE staff_id =?;");
            $devolver->bind_param("i",$id);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }
    }
?>