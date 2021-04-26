<?php

    class Alumno {
        private $nombre;
        private $apellido;
        private $dni;

        public function __construct() {
            
            switch (func_num_args()) {
                case 0: $this->construct0(); break;
                case 1:
                    $a = func_get_args()[0];
                    $this->construct1($a);
                break;
                case 2: $this->construct2(func_get_arg(0), func_get_arg(1)); break;
                case 3: $this->construct3(func_get_arg(0),func_get_arg(1),func_get_arg(2)); break;
            }
        }

        public function construct0() {
            echo "Recibe 0 parametro";
        }

        public function construct1($uno) {
            echo "Recibe 1 parametro";
        }

        public function construct2($uno, $dos) {
            echo "Recibe 2 parametro";
        }

        public function construct3($uno, $dos, $tres) {
            echo "Recibe 3 parametro";
        }

        public function mostrarTodo() {
            echo "Has llamado a mostrarTodo(); desde fuera";
        }
        
    }

    $pepe = New Alumno("Pepe", "Pérez", "66666666");
    echo "<br>";
    call_user_func_array(array($pepe,"mostrarTodo"), array());
    $pepe = New Alumno("Pepe");

?>