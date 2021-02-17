<?php

    class conexionPDO {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
        }

        public static function singleton(){ 
            if (!isset(self::$instancia)) { // se usa :: porque es static
                $miclase = __CLASS__;// __CLASS__ retorna el nombre de la clase
                self::$instancia = new $miclase;
            }
            return self::$instancia;
        }

        public function setConexion($conn){
            $this->conexion = $conn;
        }

        public function comprobarConexion() {
            if ($this->conexion->connect_errno) {
                echo "Ha habido un error";
            }else {
                echo "Conexion ok!";
            }
        }
        
        public function __clone() { 
            trisentenciaer_error('La clonación de este objeto no está permitida', E_USER_ERROR);
        }

        function actualizarContraseña($usuario, $contraseñaActual, $nuevaContraseña) {
            $consulta = $this->conexion->prepare("update personas set contraseña=? where nombre=? and contraseña=?");
            $consulta->bind_param("iss", $nuevaContraseña , $usuario, $contraseñaActual );
            $consulta->execute();
        }
    }



?>