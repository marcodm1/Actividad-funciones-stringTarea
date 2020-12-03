<?php
include "inter.php";

class Coche implements interMotor {
    public function arrancar(){}
    public function frenar(){}
    public function acelerar(){}
    public $color;
    public $precio;

    public function __construct($color, $precio) {
    $this->color  = $color;
    $this->precio = $precio;
    }

}


class Quad extends Coche {
    public function caballito(){}
    public $modelo;
    public $rejilla;

    public function __construct($modelo, $rejilla) {
        $this->modelo  = $modelo;
        $this->rejilla = $rejilla;
        }
}
    

class MaquinaCoser implements interMotor {
    public function arrancar(){}
    public function frenar(){}
    public function acelerar(){}

    public function pinchar(){}
    public $potencia;
    public $hilo;

    public function __construct($potencia, $hilo) {
        $this->potencia  = $potencia;
        $this->hilo = $hilo;
    }
}



    
   
?>
       

 