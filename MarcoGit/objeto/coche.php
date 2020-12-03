<?php


    class Coche {
        private $color;
        private $velocidad;
        const VELOCIDAD_MAXIMA  = 120;
        const COLOR_SERIE       = "blanco";
        const VELOCIDAD_INICIAL = 0;
        
        /*public*/function __construct(){ // si no recibe parametros
            if (func_num_args() == 0){ 
                $this->velocidad = self::VELOCIDAD_INICIAL;
                $this->color     = self::COLOR_SERIE;
                //$this->__construct0()
            }
            
            if (func_num_args() == 1){ // si recibe 1 parametro
                $this->velocidad = self::VELOCIDAD_INICIAL;
                $this->color     = func_num_args();
                //$this->__construct1();
            }
                
            if (func_num_args() == 2){ // si recibe 2 parametros
                $this->velocidad = func_num_args();
                $this->color     = func_num_args();
                //$this->__construct2()
            }
        }
        
       
            
        public function getVelocidad(){
            return $this->velocidad;
        }
        
        public function getColor(){
            return $this->color;
        }
        
    }


    //PROGRAMA PRINCIPAL.
    $seat   = new Coche("verde", 100);
    $vw     = new Coche("azul");
    echo "La clase coche generica, tiene como velocidad maxima de: " . Coche::VELOCIDAD_MAXIMA . '<br>';
    echo "El coche vw es de color: " . $vw->getColor() . "<br>";
    echo "El coche seat tiene una velocidad de: " . $seat->getVelocidad() . '<br>';

    // para ver elos metodos o las variables de un objeto, se usa ->
    // para ver las constantes se usa ::

    // unset lo pone a null
    // parent es la referencia del super
    // __destructi solo dice que cuando se destryua por el recolector de basuda destruct hace cosas
    // __destruct es unconstructor magico


?>