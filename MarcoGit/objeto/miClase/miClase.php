<?php
    include "inter.php";

    class Coche implements interMotor {
        private $color;
        private $precio;


        private function __construct($color, $precio) {
            $this->color  = $color;
            $this->precio = $precio;
        }


        private function arrancar(){}
        private function frenar(){}
        private function acelerar(){}
    }


    class Quad extends Coche {
        private $modelo;
        private $rejilla;


        private function __construct($modelo, $rejilla, $color, $precio) {
            parent::__construct($color, $precio);
            $this->modelo  = $modelo;
            $this->rejilla = $rejilla;
        }

        private function caballito(){}
    }
        

    class MaquinaCoser implements interMotor {
        private $potencia;
        private $hilo;


        private function __construct($potencia, $hilo) {
            $this->potencia  = $potencia;
            $this->hilo = $hilo;
        }


        private function arrancar(){}
        private function frenar(){}
        private function acelerar(){}

        private function pinchar(){}
        

        
    }



    
   
?>
       

 