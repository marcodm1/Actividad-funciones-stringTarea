<?php

    class Bbdd {
        private $conexion;
        // php pone un constructor automatico
        public function conecta($host, $usuario, $password, $bbdd) {
            //realiza la conexión con la base de datos y establece el juego de caracteres.
            $this->conexion = new mysqli("$host", "$usuario", "$password","$bbdd"); 
            if ($this->conexion->connect_errno) { 
                return "Fallo al conectar a MySQL: " . $this->conexion->connect_error ;
            }
            if (!$this->conexion->set_charset("utf8")) { 
                return "Error cargando el conjunto de caracteres utf8: %s\n" . $this->conexion->error;
            }
            return $this->conexion;
        }
        public function consultaUsuarios() {
            //devuelve un array con todos los usuarios, utilizar fetch_all
            $consulta = "Select * from usuarios";
            $resultadoConsulta = mysqli_query($this->conexion , $consulta);
            // aqui me repite nombre y contraseña
            $r =  $resultadoConsulta->fetch_all(MYSQLI_BOTH);
            return $r;
        }
        public function modificaUsuarios($login, $clave) {
            //modifica el usuario con mysqli::prepare, mysqli_stm::bind_param, mysqli_stm::execute
        }
        public function altaUsuarios($login, $clave) {
            //da de alta el usuario con mysqli::prepare, mysqli_stm::bind_param, mysqli_stm::execute
        }
        public function muestraTabla($array) {
            //recibe el array del fetch_all y muestra las filas en formato de tabla.
        }
        public function close() {
            //cierra la conexión.
        }
    }
?>