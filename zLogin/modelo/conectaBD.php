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
                // echo "Línea del error " . $error->getLine();
            }
        }
        public static function singleton(){ // comprueba si hay una instancia, y si no hay, se crea el objeto en la variable $instancia
            if (!isset(self::$instancia)) {     // se usa :: porque es static
                $miclase = __CLASS__;           // __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;// self es para los static
            }
            return self::$instancia; // devuelve el objeto tipo instancia
        } 
       
        public function comprobarUsuario($clave) {
            $consulta = $this->conexion->prepare("SELECT clave from usuarios WHERE clave = ?");
            $consulta->bindParam(1, $clave);
            
            try {
                $consulta->execute();
                $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                return $consulta;
            } catch (PDOException $error){
                return false;
            }
        }
    
    }
?>  

