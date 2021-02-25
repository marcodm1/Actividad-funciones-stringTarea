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

        
        function readUsuario() {
            $consulta = $this->conexion->prepare("SELECT * FROM personas");
            $consulta->execute();
            $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);

            return $resultado;
        }
        
    
    }
?>  

