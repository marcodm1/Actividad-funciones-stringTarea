
<?php
    // _______________________________JUGADOR_______________________________
    class Jugador {
        private $dineroCartera;
        private $cartasMano = array();

        public function __construct($dineroCartera) {
            $this->dineroCartera = $dineroCartera;
        }

       
        private function getSumaCartasMano(){
            $suma = 0;
            for ($i=0; $i<count($this->cartasMano); $i++){
                $suma += $this->cartasMano[$i]->getNumeroCarta();
            }
            return $suma;
        }

        private function apostar($num) {
            if ($num < $this->dineroCartera) {
                $this->dineroCartera -= $num;
                return $num;
            }else {
                $error = "Error: No puedes apostar mas de lo que tienes total.";
                return $error;
            }
            
        }

        
        public function getDineroCartera() {
            return $this->dineroCartera;
        }

        public function setDineroCartera($num) {
            if ($num >= 0) {
                $this->dineroCartera += $num;
            }else {
                $this->dineroCartera -= $num;
            }
        } 
        
         
        

        // funcion para ver cuantas cartas tengo
        // funcion para ver la carta en la posicion x
        // private function plantarse() {}
        // private function pedirCarta() {}

        // private function cambiarAS($num) {
        //     if ($num == 1) {
        //         return $this->numeroCarta = 11;
        //     }else {
        //         return "Error: Solo se puede modificar el 1 por el 11.";
        //     }
        
        // }

    }
    // _______________________________CASINO_______________________________
    class Casino {
        private $caja;

        public function __construct($num){
            $this->caja = $num;
        }

        private function getCaja(){
            return $this->caja;
        }
        public function setCaja($num) {
            if ($num >= 0) {
                $this->caja += $num;
            }else {
                $this->caja -= $num;
            }
        } 

        private function empezarPartida(){
            for ($i=0; $i<2; $i++) { // numero de jugadores
                for ($i=0; $i<2; $i++) { // 2 cartas por cada jugador
                    $num = mt_rand(1, 13);
                    $this->Baraja->repartirInicioPartida();

                }
                $num = mt_rand(1, count($this->barajaCartas));
            }
        }

        // private function comenzarJuego() {}
        // private function recogerCartas() {}
        // private function entregarDinero() {}
        // private function recogerDinero() {}


    }
    // _______________________________CARTA_______________________________
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

        private function getNumeroCarta() {
            return $this->numeroCarta;
        }

        // private function setNumeroCarta($num) {
        //     if () {
        //         $this->numeroCarta = 11;
        //     }
            
        // }
    }  
    // _______________________________BARAJA_______________________________
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

        private function repartirUna() {

        }
        
        private function repartirInicioPartida(){
            // le quita 2 objetos a baraja para jugador1
            // le quita 2 objetos a baraja para IA
            for ($i=0; $i<2; $i++){
                $num= mt_rand(1, 13);
                $aux = $this->barajaCartas[$num];
                unset($barajaCartas[$num]);  // unset elimina variable
            }
        }

    }
    // _______________________________PROGRAMA_______________________________

    // crear jugador
    $miJugador = new Jugador(100, 0 , null, null);
    // crear casino
    $miCasino = new Casino(1000);
    // crear baraja 
    $miBaraja = new Baraja();
    

    // -------- 1ª partida ---------

    $miCasino
    // jugador pide
    // casino reparte1
    // jugador se planta

    // casino se reparte
    // casino se reparte
    // casino se reparte
    // casino se pasa
    // casino da dinero
    // partida finalziada

    // 2ª partida

    // casino reparte
    // jugador pide
    // casino reparte1
    // jugador pide
    // jugador se pasa
    // casino recoje dinero
    // partida finalizada

    


    
?>