<?php
    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            try {
                $this->conexion = new PDO("mysql:host=localhost;dbname=dwes2","alumno","1234");
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
            $consulta = $this->conexion->prepare("INSERT into usuarios (login, clave) values(:login,:clave)");
            $consulta->bindParam(':login', $login);
            $consulta->bindParam(':clave', $clave);
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
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
            $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
            return $consulta;
        }
        
        public function updateP($login, $clave) {
            $consulta = $this->conexion->prepare("UPDAte from usuarios WHERE login = :login ");
            $consulta->bindParam(':login', $login);
            try {
                $consulta->execute();
                return "Eliminado correctamente";
            } catch (PDOException $error){
                return "Error: El usuario no tiene los permisos necesarios para eliminar.";
            }
        }

        public function deleteP($login) {
            $consulta = $this->conexion->prepare("DELETE from usuarios WHERE login = :login ");
            $consulta->bindParam(':login', $login);
            try {
                $consulta->execute();
                return "Eliminado correctamente";
            } catch (PDOException $error){
                return "Error: El usuario no tiene los permisos necesarios para eliminar.";
            }
        }

        
    
    }
?>  

