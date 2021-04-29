<?php

    class Empleado {
        private $nombre;
        private $sueldo;

        public function __construct() {
            switch (func_num_args()) {
                case 0: 
                    $this->construct0(); 
                    break;
                case 1:
                    $this->construct1(func_get_arg(0) );
                    break;
                case 2: 
                    $this->construct2(func_get_arg(0), func_get_arg(1) ); 
                    break;
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