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

        //INSERT INTO customer(first_name, last_name, email,store_id,address_id) VALUES('','','',1,10);
        public function addCliente($nombre, $apellido, $correo){
            if(empty($nombre) || empty($apellido) || empty($correo)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("INSERT INTO customer(first_name, last_name, email,store_id,address_id) VALUES(?,?,?,?,10);");
            $devolver->bind_param("sssi",$nombre,$apellido,$correo,$_SESSION['Store']);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }

        //UPDATE customer SET first_name = "1", last_name = "2", email="3" WHERE customer_id = 608;
        public function actualizarCliente($nombre, $apellido, $correo, $id){
           if(empty($nombre) || empty($apellido) || empty($id) || empty($correo)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("UPDATE customer SET first_name = ?, last_name = ?, email= ? WHERE customer_id = ?;");
            $devolver->bind_param("sssi",$nombre,$apellido,$correo,$id);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }

        // DELETE FROM customer WHERE customer_id = 204;
        public function eliminarCliente($id){
            if(empty($id)){
            return false;
          }
          else {
            $devolver = $this->consulta->prepare("DELETE FROM customer WHERE customer_id = ?;");
            $devolver->bind_param("i",$id);
            $devolver->execute();
            $devolver->close();
            return true;
          }
        }
    }
?>