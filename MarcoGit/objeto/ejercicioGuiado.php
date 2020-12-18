<?php

    interface Imprimible {
        public function imprime();
    }

    abstract class Figura {
        private $nombre;
        private $color;
        private $esRellena = false;

        public function __constructor($nombre) {
            $this->nombre = $nombre;
        }

        private function estaRellena() {
            $this->esRellena = true;
        }
        private function estaVacia() {
            $this->esRellena = true;
        }
        private function showInfo() {
            echo  "El nombre del padre es: " . $this->nombre->getNombre();
            echo  "El color del padre es: "  . $this->color->getColor();
            if ($this->esRellena) {
                echo "La figura del padre esta rellena.";
            }else {
                echo "La figura del padre no esta rellena.";
            }
            echo "El radio del Circulo es: "  . $this->radio->getRadio();
            echo "El area del Circulo es: "   . $this->radio->getArea();
            echo "El radio del Circulo es: "  . $this->radio->getRadio();
            echo "El radio del Cuadrado es: " . $this->cuadrado->getLado();
            echo "El radio del Cuadrado es: " . $this->cuadrado->getArea();

            // mostrar propiedades de las hijas 
        }

        private function getNombre() {
            return $this->nombre;
        }
        final function setNombre($nombre) {
            $this->nombre = $nombre;
        }
        private function getColor() {
            return $this->color;
        }
        private function setColor($color) {
            $this->color = $color;
        }
    }


    class Circulo extends Figura {
        private $radio;

        public function __constructor($radio, $nombre){
            parent::__constructor($nombre);
            $this->radio = $radio;
        }

        public function getRadio() {
            return $this->radio;
        }

       
        public function setRadio($radio){
            $this->radio = $radio;
        }

        public function getNombre(){
            return "circulo";
        }

        public function getArea(){
            $area = pi() * pow($this->radio->getRadio(), 2); 
            return "El area del circulo es: " . $area;
        }
    }


    class Cuadrado extends Figura implements Imprimible {
        private $lado;

        public function __constructor($lado, $nombre){
            parent::__constructor($nombre);
            $this->lado = $lado;
        }

        public function getLado(){
            return $this->lado;
        }

        public function setLado($lado){
            $this->lado = $lado;
        }

        public function imprime() {
            if($esRellena) {
                echo '<div style="width: 1in; height: 1in;"/>';
            }
            else echo "<div style=\"width: 1in; height: 1in; background-color: ${$color};\"/>";
        }

   
    }



?>