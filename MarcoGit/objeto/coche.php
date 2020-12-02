<?php


    class Coche {
        private $color;
        private $velocidad;
        const VELOCIDAD_MAXIMA  = 120;
        const COLOR_SERIE       = "blanco";
        const VELOCIDAD_INICIAL = 0;
        
        //constructores
        /*
        - no recibe nada: inicialice los valores a color=<COLOR DE SERIE>, velocidad =<VELOCIDAD INICIAL >
        - recibe la color: lor será el que nos dan,  y la velocidad la inicial
        - recibe la color y la velocidad: inicializa las propiedades con los valores que nos dan. 

        constante, objetos, tokens, repaso del examen, js
        */
        public function __construct(){ // si no recibe parametros
            if (func_num_args() == 0){ 
                $this->velocidad = self::VELOCIDAD_INICIAL;
                $this->color     = self::COLOR_SERIE;
                //$this->__construct0()
            }
            
            if (func_num_args() == 1){ // si recibe 1 parametro
                $this->velocidad = self::VELOCIDAD_INICIAL;
                $this->color     = func_num_args(0);
                //$this->__construct1();
            }
                
            if (func_num_args() == 2){ // si recibe 2 parametros
                $this->velocidad = func_num_args(0);
                $this->color     = func_num_args(1);
                //$this->__construct2()
            }
        }
        
        private function __construct0(){
            $this->velocidad = self::VELOCIDAD_INICIAL;
            $this->color     = self::COLOR_SERIE;
        }

        private function __construct1(){
            $this->velocidad = self::VELOCIDAD_INICIAL;
            $this->color     = func_num_args(0);
        }

        private function __construct2(){
            $this->velocidad = func_num_args(0);
            $this->color     = func_num_args(1);
        }
        

            
        public function getVelocidad(){
            return $this->velocidad;
        }
        
        public function getColor(){
            return $this->color;
        }
        
    }


    //PROGRAMA PRINCIPAL.
    $seat = new Coche("verde", 100);
    
    echo Coche::VELOCIDAD_MAXIMA . '<br>';

    
    // echo $seat::VELOCIDAD_MAXIMA . "<br>";
    echo $seat->getVelocidad() . '<br>';

    // para ver elos metodos o las variables de un objeto, se usa ->
    // para ver las constantes se usa ::
?>