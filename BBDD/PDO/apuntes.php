<?php
        // tabla1
    // nombre      apellido        id
    // juan        jj              43
    
    $conexionBBDD      = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    $sentencia = $conexionBBDD->prepare("INSERT INTO personas values (:nombre,:id) "); // prepare devuelve un objeto tipo sentencia
    $sentencia->bindParam(":nombre", "Juan"); // que es lo mismo que el bind_param pero sin _ y sin el "si" inicial
    $sentencia->bindParam(":id", 20);
    $sentencia->execute();
    $apellido = $sentencia->fetchColumn(1); // devuelve el dato de la columna elegida, en este caso 1, devolveria el apellido
    
    $filasAfectadas = $sentencia->rowCount();     // es como el exec, devuelve numero de filas afectadas
    $ultimoPKcreado = $conexionBBDD->lastInsertId(); // Este método devuelve el ultimo de PK creado. de la conexion, no de la sentencia
    // el metodo fetchall(); es un metodo de conexionBBDD que devuelve un array de registros 
    // y en el parametro de fetchall() se especifica la manera de retornarlo 
    $personas       = $sentencia->fetchAll(PDO::FETCH_ASSOC);
   

    class Dao {
        private $conexion;
        private static $instancia;

        private function __construct() {
            $this->conexion = new mysqli("localhost", "root", "", "dwes");
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

    // main
    $connn = new mysqli("localhost", "root", "", "dwes");
    $a = Dao::singleton();
    $a->setConexion($connn);
    $a->comprobarConexion();
    $a->actualizarContraseña($usuario, $contraseñaActual, $nuevaContraseña);

    // Imprimir en pantalla
    print_r($resultado);
?>