<?php
    include "inter.php";

    class Coche implements interMotor {
        private $color;
        private $precio;
        public function __construct($color, $precio) {
            $this->color  = $color;
            $this->precio = $precio;
        }
        function arrancar(){}
        function frenar(){}
        function acelerar(){}

        public function getColor(){
            return $this->color;
        }
        
        public function getPrecio(){
            return $this->precio;
        }

        public function setColor($a){
            $this->color = $a;
        }
        
        public function setPrecio($a){
            $this->precio = $a;
        }
    }


    class Quad extends Coche {
        private $modelo;
        private $rejilla;
        public function __construct($modelo, $rejilla, $color, $precio) {
            parent::__construct($color, $precio);
            $this->modelo  = $modelo;
            $this->rejilla = $rejilla;
        }

        public function getModelo(){
            return $this->modelo;
        }
        
        public function getRejilla(){
            return $this->rejilla;
        }

        public function setModelo($a){
            $this->modelo = $a;
        }
        
        public function setRejilla($a){
           $this->rejilla = $a;
        }
    }
        

    class MaquinaCoser implements interMotor {
        private $potencia;
        private $hilo;
        public function __construct($potencia, $hilo) {
            $this->potencia  = $potencia;
            $this->hilo      = $hilo;
        }
        function arrancar(){}
        function frenar(){}
        function acelerar(){}

        public function getPotencia(){
            return $this->potencia;
        }
        
        public function getHilo(){
            return $this->hilo;
        }

        public function setPotencia($a){
            $this->potencia = $a;
        }
        
        public function setHilo($a){
            $this->hilo = $a;
        }
    }





   
?>
       

 