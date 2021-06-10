<?php
require_once("interfaz.php");
    class Coche implements Tiempo {
        private $kmActual;

        public function __construct() {
            $this->kmActual = 0;
        }

        public function __get($propiedad) {
            if (property_exists($this, $propiedad)) {
                return $this->$propiedad;
            }else {
                echo "No existe la propiedad indicada.";
            }
        }

        public function avanza() {
            $this->kmActual += 100;
        }
        public function retrocede() {
            $this->kmActual -= 100;
        }
    }

    class Pelicula implements Tiempo {
        private $minActual;

        public function __construct() {
            $this->minActual = 0;
        }

        public function __get($propiedad) {
            if (property_exists($this, $propiedad)) {
                return $this->$propiedad;
            }else {
                echo "No existe la propiedad indicada.";
            }
        }
        
        public function avanza() {
            $this->minActual += 3;
        }
        public function retrocede() {
            $this->minActual -= 3;
        }
    }

    $seat = new Coche();
    $seat->avanza();
    $seat->avanza();
    $seat->avanza();
    $seat->retrocede();
    $seat->retrocede();
    echo "Actualmente estamos en el km " . $seat->kmActual;

    $peli = new Pelicula();
    $peli->avanza();
    $peli->avanza();
    $peli->avanza();
    $peli->retrocede();
    $peli->retrocede();
    echo "<br>Actualmente estamos en el minuto " . $peli->minActual;
    

?>