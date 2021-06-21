<?php
    class ConectaBD {
        private $conexion;
        // php puede poner un constructor automatico
        public function conectarse($host, $usuario, $password, $bbdd) {
            $this->conexion = new mysqli($host, $usuario, $password,$bbdd); 
            if ($this->conexion->connect_errno) { 
                return "Fallo al conectarse a la bbdd: " . $this->conexion->connect_error ;
            }
            if (!$this->conexion->set_charset("utf8")) { 
                return "Error cargando el conjunto de caracteres utf8:" . $this->conexion->error;
            }
            return $this->conexion;
        }
        public function consultarUsuarios() {
            $conexion  = "SELECT * from usuarios";
            $resultado = mysqli_query($this->conexion , $conexion); 
            if (!$resultado) {
                return "Error: No se ha encontrado ningun usuario";
            }
            return $resultado->fetch_all(MYSQLI_NUM);
        }
        public function altaUsuarios($login, $clave) {
            if ($conexion = $this->conexion->prepare("INSERT into usuarios (login, clave) values(?, ?)")) { 
                $conexion->bind_param("si", $login, $clave);
                $conexion->execute();
                return "Añadido correctamente";
            }else {
                return "Error: no se puede modificar ese usuario";
            }
        }
        public function modificarUsuarios($login, $clave, $loginN, $claveN) {
            if ($conexion = $this->conexion->prepare("UPDATE usuarios set login = $loginN and clave = $claveN WHERE login = ? and clave = ?")) { 
                $conexion->bind_param("si", $login, $clave);
                $conexion->execute();
                return "Actualizado correctamente";
            }else {
                return "Error: no es posible modificar este usuario";
            }
           
        }
        public function close() {
            $this->conexion->close();
        }
        public function muestraTabla($array) {
            echo '<table>';
            foreach($array as $valor) {
                echo '<tr>';
                foreach($valor as $x) {
                    echo'<td>'.$x.'</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
    }
?>

