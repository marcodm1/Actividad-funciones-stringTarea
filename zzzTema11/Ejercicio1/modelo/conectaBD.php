<?php
    // Ver los vídeos(78,79,80):

    // https://www.youtube.com/watch?v=n_z5f39_iTU&t=2s
    // https://www.youtube.com/watch?v=2Xb_n-GUSU0
    // https://www.youtube.com/watch?v=2djO4LzcSNw&t=616s
    // Realizar la práctica del vídeo, con los siguientes cambios: 

    // Utilizar la tabla productos del SQL que os he enviado en el tema anterior. 
    // Y la base de datos dwes2, con el usuario: alumno contraseña: 1234
    // Emplear una clase PDO, para conectar con la base de datos que utilice el patrón Singleton.
    // Entregar en un Zip las carpetas modelo, vista, controlador, con los fuentes: 

    // inicio.php
    // controlador/controlador.php
    // modelo/conectaDB
    // modelo/Productos_modelo.php
    // vista/Productos_visat.php

    class ConectaBD {
        private $conexion;
        private static $instancia;

        private function __construct() {
            try {
                $this->conexion = new PDO("mysql:host=localhost;dbname=dwes2","alumno","1234");
                $this->resultados = array();
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
       
        public function createP() {
            $idFabricante = "marco1";
            $idProducto   = "marco2";
            $descripcion  = "marco3";
            $precio       = "marco4";
            $existencias  = "marco5";
            $consulta = $this->conexion->prepare("INSERT into productos(idFabricante,idProducto,descripcion,precio,existencias) values(:idFabricante,:idProducto,:descripcion,:precio,:existencias)");
            $consulta->bindParam(':idFabricante', $idFabricante);
            $consulta->bindParam(':idProducto'  , $idProducto);
            $consulta->bindParam(':descripcion' , $descripcion);
            $consulta->bindParam(':precio'      , $precio);
            $consulta->bindParam(':existencias' , $existencias);
            $consulta->execute();
            // comprobar si se ha hecho bien o si se ha hecho mal
        }
        public function readP($filtro) {
            switch ($filtro) {
                case "todos":
                    $consulta = $this->conexion->prepare("SELECT * from productos");
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    // comprobar si se ha hecho bien o si se ha hecho mal?
                    return $consulta;
                    break;
                case "caros":
                    $numero   = 200;
                    $consulta = $this->conexion->prepare("SELECT * from productos WHERE precio > :numero");
                    $consulta->bindParam(':numero', $numero); // se tiene que pasar por referencia
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    // comprobar si se ha hecho bien o si se ha hecho mal?
                    return $consulta;
                    break;
                case "carosPocos":
                    $numero   = 200;
                    $numero2  = 20;
                    $consulta = $this->conexion->prepare("SELECT * from productos WHERE precio > :numero and existencias < :numero2"); // como seria con muchos and?
                    $consulta->bindParam(':numero', $numero); 
                    $consulta->bindParam(':numero2', $numero2); 
                    $consulta->execute();
                    $consulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
                    // comprobar si se ha hecho bien o si se ha hecho mal?
                    return $consulta;
                    break;
                default:
                    return "No existe el filtro deseado";
            }
            
        }
        public function updateP() {
            $existencias = "11";
            $id = "mar";
            $consulta = $this->conexion->prepare("UPDATE productos SET existencias = :existencias WHERE  idFabricante = :idfabricante");
            $consulta->bindParam(':existencias', $existencias);
            $consulta->bindParam(':idfabricante', $id);
            $consulta->execute();
            // comprobar si se ha hecho bien o si se ha hecho mal
        }
        public function deleteP() {
            $existencias = 11;
            $consulta = $this->conexion->prepare("DELETE from productos WHERE existencias = :existencias ");
            $consulta->bindParam(':existencias', $existencias);
            $consulta->execute();
            // comprobar si se ha hecho bien o si se ha hecho mal
        }

        
    
    }
?>  

