<?php
    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            try {
                $this->conexion = new PDO("mysql:host=localhost;dbname=dwes2","root","");
                $this->conexion->exec("set names utf8"); // esto esta bien? 
            }catch(Exception $error) {
                die("Error:" . $error->getMessage());
                echo "Línea del error " . $error->getLine();
            }
        }
        public static function singleton(){ // comprueba si hay una instancia, y si no hay, se crea el objeto en la variable $instancia
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        } 
       
        public function createP($login, $clave) {
            $newPass  = password_hash($clave, PASSWORD_DEFAULT);
            $consulta = $this->conexion->prepare("INSERT into usuarios (login, clave) values(?, ?)"); // es sql injeccion ?
            $consulta->bindParam(1, $login);
            $consulta->bindParam(2, $newPass);
            try {
                $consulta->execute();
                return "Creado correctamente";
            } catch (PDOException $error){ // no estoy utilizando $error
                return "Error: El usuario no tiene los permisos necesarios para añadir.";
            }
        }
        public function readP() {
            $consulta = $this->conexion->prepare("SELECT * from usuarios");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){ // no estoy utilizando $error
                return "Error: No se ha podido acceder a los datos.";
            }
        }
        
        public function updateP($loginOld, $loginNew, $claveNew) {
            $newPass  = password_hash($claveNew, PASSWORD_DEFAULT); 
            // creo que para comprobarlo es el password_verify();
            $consulta = $this->conexion->prepare("UPDATE usuarios SET login = ?, clave = ? WHERE login = ? ");
            $consulta->bindParam(1, $loginNew);
            $consulta->bindParam(2, $newPass);
            $consulta->bindParam(3, $loginOld);
            try {
                $consulta->execute();
                return "Actualizado correctamente";
            } catch (PDOException $error){ // no estoy utilizando $error
                return "Error: El usuario no tiene los permisos necesarios para modificar.";
            }
        }

        public function deleteP($loginOld) {
            $consulta = $this->conexion->prepare("DELETE from usuarios WHERE login = ? ");
            $consulta->bindParam(1, $loginOld);
            try {
                $consulta->execute();
                return "Eliminado correctamente";
            } catch (PDOException $error){ // no estoy utilizando $error
                return "Error: El usuario no tiene los permisos necesarios para eliminar.";
            }
        }

        public function comprobarUsuario($login) {
            $consulta = $this->conexion->prepare("SELECT * from usuarios WHERE login = ?");
            $consulta->bindParam(1, $login);
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                if (!empty($consulta)) {
                    return true;
                }
            } catch (PDOException $error){ // no estoy utilizando $error
                return false;
            }
        }
    
    }
?>  

