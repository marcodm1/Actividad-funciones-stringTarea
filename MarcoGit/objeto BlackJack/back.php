
<?php

    class Jugador {
        private $cartera;

        public function __construct($cartera) {
            $this->cartera = $cartera;
        }

        private function apostar($num) {
            if ($num < $this->cartera) {
                $this->cartera = $this->cartera - $num;
                return $num;
            }else {
                $error = "Error: No puedes apostar mas de lo que tienes total.";
                return $error;
            }
            
        }
        // private function plantarse() {}
        // private function pedirCarta() {}
        private function cambiarAS($num) {
            if ($num == 1) {
                return $this->numeroCarta = 11;
            }else {
                return "Error: Solo se puede modificar el 1 por el 11.";
            }
        
        }

    }

    class Carta {
        private $numeroCarta;
        // private $figura  = false;
        // private $figura; 
         

        public function __construct($num){
            switch ($num){
                case 1: 
                    if ($num >0 && $num <10){
                        return $this->numeroCarta = $num;
                    }
                case 2:
                    if ($num >= 10 && $num <14){
                        return $this->numeroCarta = 10;
                    }
            }
        }
    }  

    class Casino {
        private $caja;

        public function __construct($num){
            $this->caja = $num;
        }

        // private function repartir(){
        //     // -2 a bajara para jugador1
        //     // -2 a naraka para casiono
        //     $aux = 0;
        //     for ($i=0; $i<2; $i++) {
        //         $num = rand(1, count($this->barajaCartas));
        //         $aux = $this->barajaCartas[$num];
        //     }
        // }

        // private function comenzarJuego() {}
        // private function recogerCartas() {}
        // private function entregarDinero() {}
        // private function recogerDinero() {}


    }

    class Baraja { 
        private $barajaCartas = array();
        
        public function __construct(){

            for ($i=0; $i<4; $i++){
                for ($j=1; $j<14; $j++){
                    $barajaCartas[] = new Carta($j);
                }
                $j = 1;
            }
        }

        // private function quitarCarta(){}

        private function repartir(){
            // le quita 2 objetos a baraja para jugador1
            // le quita 2 objetos a baraja para IA
            $aux = 0;
            $aux = 0;
            for ($i=0; $i<2; $i++){
                $num= rand(1, count($this->barajaCartas));
                $aux = $this->barajaCartas[$num];
                unset($barajaCartas[$num]);
            }
        }
        // metodos mezclar

    }

    


   

    // -------- programa ---------
    
    $baraja = new Baraja();
    // $baraja->repartir(); // 2 al jugador
    // repartir 2 cartas a cada uno

    // $respuesta = true/false 
  
    // poner algo para que la maquina termine si le toca entre 17 y 21
    // primero juega el usuario y luego la maquina
    // hacer el juego paso a paso

    


    
?>