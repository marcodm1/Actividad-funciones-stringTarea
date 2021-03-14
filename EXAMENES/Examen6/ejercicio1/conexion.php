<?php

    class Conexion {
        private $conexion;
        private static $instancia;
        

        private function __construct() {
            $this->conexion = new PDO('mysql:host=localhost;dbname=pedro', 'root', '123');
        }

        public static function singleton(){     // comprueba si hay una instancia, y si no hay, se crea el objeto en la variable $instancia
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        } 

        function comprobarLogin($login, $clave) {
            $clave = password_hash($clave, PASSWORD_DEFAULT);

            $consulta = $this->conexion->prepare("SELECT * from acceso where login=:login and clave=:clave");
            $consulta->bindParam(":login", $login);  // bindParam quita sql injections
            $consulta->bindParam(":clave", $clave);
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_CLASS);

            return count($resultado) != 0;
        }

        function comprobarFecha($fecha) {
            $consulta = $this->conexion->prepare("SELECT * from evento where fecha=:fecha");
            $consulta->bindParam(":fecha", $fecha); 
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_CLASS);
            if (count($resultado) > 0) {
                return comprobarHora($hora);
            }
            return true;

        }

        function comprobarHora($hora) {
            $consulta = $this->conexion->prepare("SELECT * from evento where hora=:hora ");
            $consulta->bindParam(":hora", $hora); 
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_CLASS);
            return count($resultado) == 0;
        }
       
        function createUsuario($nombre, $apellido, $pais, $contraseña) {
            $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
            $pass     = password_hash($contraseña, PASSWORD_DEFAULT);
            $consulta = $conexion->prepare("insert into personas (nombre, apellido, pais, contrasenia)  values (:nombre, :apellido, :pais, :contrasenia)");
            $consulta->bindParam(":nombre"     , $nombre);
            $consulta->bindParam(":apellido"   , $apellido);
            $consulta->bindParam(":pais"       , $pais);
            $consulta->bindParam(":contrasenia", $pass);
            $consulta->execute();
        }

        
    }
?>  

