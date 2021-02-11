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

        function comprobarUsuario($id, $password) {
            $consulta = $this->conexion->prepare("SELECT * from personas where id=:id");// quito contraseña
            $consulta->bindParam(":id", $id); 
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            if (count($resultado) == 0) {
                return false;
            }
            $passwordHash = $resultado[0]['contrasenia'];
            if (!password_verify($password, $passwordHash)) {
                return false;
            }
            return true;
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

        function readUsuario($name) {
            $consulta = $this->conexion->prepare("select * from personas where nombre = :nombre");
            $consulta->bindParam(":nombre", $name); 
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $resultado;
        }

        function updateUsuario($name, $nameNuevo, $id) {
            $consulta = $this->conexion->prepare("UPDATE personas set nombre=:nameNuevo where nombre=:nombre and id=:id ");
            $consulta->bindParam(":nameNuevo", $nameNuevo);
            $consulta->bindParam(":nombre", $name); 
            $consulta->bindParam(":id", $id);
            $consulta->execute();
        }

        function deleteUsuario($id, $password) {
            if (!$this->comprobarUsuario($id, $password)) {
                return false;
            }

            $consulta = $this->conexion->prepare("DELETE from personas where  id=:id");
            $consulta->bindParam(":id", $id);
            $consulta->execute();
            return true;
        }

    }
?>  

