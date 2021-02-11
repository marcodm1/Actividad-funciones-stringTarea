<?php

    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
        }

        public static function singleton(){     // comprueba si hay una instancia, y si no hay, se crea el objeto en la variable $instancia
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        } 

        function comprobarUsuario($name, $password) {
            $consulta = $this->conexion->prepare("SELECT * from personas where nombre = :nombre");// quito contraseña
            $consulta->bindParam(":nombre", $name); 
            $consulta->execute();
            $resultado    = $consulta->fetchAll(PDO::FETCH_ASSOC);
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
       
        function createUsuario($nombre, $apellido, $pais, $contraseña) {
            // autoincrementa y aplica id
            $pass     = password_hash($contraseña, PASSWORD_DEFAULT);
            $consulta = $this->conexion->prepare("insert into personas values (:nombre, :apellido, :pais, :contraseña)");
            $consulta->bindParam(":nombre"      , $nombre);
            $consulta->bindParam(":apellido"    , $apellido);
            $consulta->bindParam(":pais"        , $pais);
            $consulta->bindParam(":contraseña"  , $pass);
            $consulta->execute();
        }

        function readUsuario($name) {
            $consulta = $this->conexion->prepare("select * from personas where nombre = ?");
            $consulta->bindParam("s", $name); 
            $consulta->execute();
            
            $resultado = $consulta->get_result();
            $resultado = $resultado->fetch_all();
            return $resultado;
            // 
            // if ($resultado->num_rows) {// retorna informacion de la tabla y fetch_all los resultados de la consulta
            //     $resultado->fetch_all(MYSQLI_ASSOC);
            //     return $resultado;
            // }else {
            //     return null;
            // }
        }

        function updateUsuario($name, $password, $newPassword) {
            $consulta = $this->conexion->prepare("UPDATE personas set contraseña = ? where nombre = ? and contraseña = ?");
            $consulta->bindParam("sss", $newPassword, $name, $password); 
            $consulta->execute();
        }

        function deleteUsuario($name, $password) {
            $consulta = $this->conexion->prepare("DELETE from personas where contraseña = ? and nombre = ?");// prepare para evitar sql injection
            $consulta->bindParam("ss", $password, $name); // esto es anti SQL injection
            $consulta->execute();
        }


        function hashearContraseña($password) {
            // tengo que pasarlo a int la contraseña?
            $password   = password_hash($_POST['password'], PASSWORD_DEFAULT); // $password = el hasheado de $_POST['password'], con el estilo PASSWORD_DEFAULT 
            return $password;
        }


    }
?> 

