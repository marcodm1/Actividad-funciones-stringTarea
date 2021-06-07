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
            $consulta = $this->conexion->prepare("INSERT into usuarios (login, clave) values(?, ?)");
        $consulta->bindParam(1, $login /*,PDO::PARAM_INT si ponemos esto es para indicar el tipo de dato por ejemplo PDO::PARAM_STR*/);
            $consulta->bindParam(2, $newPass);
            try {
                $consulta->execute();
                return "Creado correctamente";
            } catch (PDOException $error){
                return "Error: El usuario no tiene los permisos necesarios para añadir.";
            }
        }
        public function readP() {
            $consulta = $this->conexion->prepare("SELECT * from usuarios");
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
        }
        
        public function updateP($login1, $login2, $clave) {
            $newPass  = password_hash($clave, PASSWORD_DEFAULT); 
            $consulta = $this->conexion->prepare("UPDATE usuarios SET login = ? and clave = ? WHERE login = ? ");
            $consulta->bindParam(1, $login2);
            $consulta->bindParam(2, $newPass);
            $consulta->bindParam(3, $login1);
            try {
                $consulta->execute();
                return "Actualizado correctamente";
            } catch (PDOException $error){
                return "Error: El usuario no tiene los permisos necesarios para modificar.";
            }
        }

        public function deleteP($login, $clave) {
            $consulta = $this->conexion->prepare("SELECT clave from usuarios WHERE login = ?");
            $consulta->bindParam(1, $login);
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                foreach ($consulta as $poss => $valor) {
                    foreach ($valor as $clavee) {
                        $hash = $clavee;
                    }
                }
            } catch (PDOException $error){
                return "Error: No se ha podido acceder a los datos.";
            }
            if (!password_verify($clave, $hash)) { // no me funciona bien esta parte
                return "La contraseña no coincide";
            }
            $consulta = $this->conexion->prepare("DELETE from usuarios WHERE login = ?");
            $consulta->bindParam(1, $login);
            try {
                $consulta->execute(); // PDOException: SQLSTATE[HY093]: Invalid parameter number: number of bound variables does not match number of tokens
                return "Eliminado correctamente";
            } catch (PDOException $error){
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

