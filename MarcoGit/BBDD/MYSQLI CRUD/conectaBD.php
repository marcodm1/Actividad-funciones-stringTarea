<?php

    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new mysqli("localhost", "root", "", "dwes");
        }

        public static function singleton(){     // comprueba si hay una instancia, y si no hay, se crea el objeto en la variable $instancia
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        }

        function createUsuario($id, $name, $apellido, $pais, $password) {
            $consulta = $this->conexion->prepare("insert into personas values (?, ?, ?, ?)");
            $consulta->bind_param("isssi", $id, $name, $apellido, $pais, $password);
            $consulta->execute();
        }

        function readUsuario($name) {
            $consulta = $this->conexion->prepare("select * from personas where nombre = ?");
            $consulta->bind_param("s", $name); 
            $consulta->execute();
            $resultado = $consulta->get_result();
            if ($resultado->num_rows) {// retorna informacion de la tabla y fetch_all los resultados de la consulta
                $resultado->fetch_all(MYSQLI_ASSOC);
                return $resultado;
            }else {
                return null;
            }
        }

        function updateUsuario($name, $password, $newPassword) {
            $consulta = $this->conexion->prepare("UPDATE personas set contraseña = ? where nombre = ? and contraseña = ?");
            $consulta->bind_param("isi", $newPassword, $name, $password); 
            $consulta->execute();
        }

        function deleteUsuario($name, $password) {
            $consulta = $this->conexion->prepare("DELETE from personas where contraseña = ? and nombre = ?");// prepare para evitar sql injection
            $consulta->bind_param("is", $password, $name); // esto es anti SQL injection
            $consulta->execute();
        }

        function comprobarUsuario($name, $password) {
            $consulta = $this->conexion->prepare("select * from personas where nombre = ? and contraseña = ?");
            $consulta->bind_param("s", $name); 
            $consulta->execute();

            $resultado = $consulta->get_result();
            $resultado->fetch_all(MYSQLI_ASSOC);// resultado es un array fetch_all devuelve resultado de la consulta, y el assoc lo muestra de x manera
            $passwordHash = $resultado[0]['contraseña']; 
            
            password_verify($password, $passwordHash); // hashea la contraseña actual y la compara con la contraseña de la BBDD
            $resultado = $consulta->get_result();
            
            if ($resultado->num_rows) {// retorna informacion de la tabla y fetch_all los resultados de la consulta
                $resultado->fetch_all(MYSQLI_ASSOC);
                return $resultado;
            }else {
                return null;
            }
        }

        function hashearContraseña($password) {
            $password   = password_hash($_POST['password'], PASSWORD_DEFAULT); // $password = el hasheado de $_POST['password'], con el estilo PASSWORD_DEFAULT 
            return $password;
        }


    }
?> 

