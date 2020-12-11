<?php
    class Figura {
        private $nombre;
        private $color;
        private $esRellena = false;

        public function __constructor($nombre){
            $this->nombre = $nombre;
        }

        abstract private function estaRellena(){
            $this->esRellena = true;
        }

        abstract private function estaVacia(){
            $this->esRellena = true;
        }
        
        abstract public function showInfo(){
            echo "El nombre del padre es: " . $nombre.getNombre();
            echo "El color del padre es: "  . $color.getColor();
            if ($esRellena){
                echo "La figura del padre esta rellena.";
            }else {
                echo "La figura del padre no esta rellena.";
            }
            echo "El radio del Circulo es: " . $radio.getNombre();
            echo "El area del Circulo es: "  . $radio.getArea();
            echo "El radio del Circulo es: " . $radio.getRadio();
            echo "El lado del Cuadrado es: " . $cuadrado.getLado();
            echo "El area del Cuadrado es: " . $cuadrado.getArea();


            // mostrar propiedades de as dos hijas
        }

        public function getNombre(){
            return $this->nombre;
        }

        final function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($color){
            $this->color = $color;
        }

    }

    class Circulo extends Figura(){
        private $radio;

        public function __constructor($radio, $nombre){
            parent::__construct($nombre);
            $this->radio = $radio
        }

        public getRadio(){
            return $this->radio;
        }

        public setRadio($radio){
            $this->radio = $radio;
        }

        public getNombre(){
            return "circulo";
        }

        public getArea(){
            $area = pi() * pow($radio.getRadio(), 2); 
            return "El area del circulo es: " . $area;
        }

    }

    class Cuadrado extends Figura(){
        private $lado;

        public function __constructor($lado, $nombre){
            parent::__construct($nombre);
            $this->lado = $lado
        }

        public getLado(){
            return $this->lado;
        }

        public setLado($lado){
            $this->lado = $lado;
        }

        public getArea(){
            $area = pow($lado.getLado(), 2); 
            return "El area del cuadrado es: " . $area;
        }

    }


    $figura = new Figura("cuadrado");
    $figura.setColor("azul");
    $figura.estaRellena();
    $figura.showInfo();
    // _____________________
    $cirulo = new Circulo(10, "circulo");
    $circulo.getArea();
    // _____________________
    $cuadrado = new Cuadrado(5, "cuadrado");



// posibles fallos: Utilizando parent::, ampliar showInfo() para que muestre las propiedades de la clase hija, tanto
// en Circulo como en Cuadrado.


?>