<?php

    class Alumno {
        private $nombre;
        private $apellido;
        private $dni;

        public function __construct() {
            switch (func_num_args()) { // Devuelve el número de argumentos pasados a la función x
                case 0: 
                    $this->construct0(); 
                    break;
                case 1:
                    $uno = func_get_args()[0]; // Devuelve un array de argumentos de función
                    $this->construct1($uno);
                    break;
                case 2: 
                    $uno = func_get_args()[0];
                    $dos = func_get_args()[1];
                    $this->construct2($uno, $dos); 
                    break;
                case 3: 
                    $uno  = func_get_args()[0];
                    $dos  = func_get_args()[1];
                    $tres = func_get_args()[2];
                    $this->construct3($uno, $dos, $tres); 
                    break;
            }
        }

        public function construct0() {
            echo "Recibe 0 parametro";
        }
        public function construct1($uno) {
            echo "Recibe 1 parametro:" . $uno;
        }
        public function construct2($uno, $dos) {
            echo "Recibe 2 parametros:" . $uno . " y " . $dos;
        }
        public function construct3($uno, $dos, $tres) {
            echo "Recibe 3 parametros:" . $uno . ", " . $dos . " y " . $tres;
        }

        public function mostrarTodo() {
            echo "Has llamado a mostrarTodo(); desde fuera";
        }
        
    }

    function fueraDeObjeto($a, $b) {
        echo $a . "<br>";
        echo $b;
    }

    $pepe = New Alumno("Pepe", "Pérez", "66666666");
    echo "<br>";
    call_user_func_array("fueraDeObjeto", array("Pepe","Perez"), ); // diferencia entre esto y fueraDeObjeto("Pepe","Perez");
    // call_user_func_array(array($pepe,"Perez"), "mostrarTodo"); // Llamar a una llamada de retorno con un array de parámetros


?>