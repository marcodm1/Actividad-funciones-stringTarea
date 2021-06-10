<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="">
</head>
<body>
<?php
    class Empleado {
        private $nombre;
        private $sueldo;

        public function __construct() {
            $args     = func_get_args();
            $num_args = func_num_args();
            if (method_exists($this, $nombre_funcion = 'constructor' . $num_args)) {
                call_user_func_array(array($this, $nombre_funcion), $args);
            }
        }

        public function construct0() {
            $this->nombre = "";
            $this->sueldo = 0;
        }

        public function construct1($nombre) {
            $this->nombre = $nombre;
        }

        public function construct2($nombre, $sueldo) {
            $this->nombre = $nombre;
            $this->sueldo = $sueldo;
        }

        public function mostrarDatos() {
            echo "Nombre: " . $this->nombre . "<br>";
            echo "Sueldo: " . $this->sueldo;
        }

        public function __get($propiedad){
            if (property_exists(__CLASS__, $propiedad)){
                return $this->$propiedad;
            }
            //return $propiedad. ' no existe';
            return null;
        }

    }

    $pepe = new Empleado();
    $pepe->mostrarDatos();
    echo "<br><br>";

    $juan = new Empleado("Juan");
    $juan->mostrarDatos();
    echo "<br><br>";

    $luis = new Empleado("Luis", 1000);
    $luis->mostrarDatos();
    echo "<br><br>";
?> 

</body>
</html>

