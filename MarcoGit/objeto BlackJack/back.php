
<?php
    // include "interface.php";

    if (isset($_POST['nombre'])){
    }else {
        header("Location:menu.php");
    }

    class Jugador {
        private $dineroTotal;

        public function __construct($dineroTotal){
            $this->dineroTotal = $dineroTotal;
        }

        private function apostar($num) {
            if ($num < $this->dineroTotal){
                $this->dineroTotal = $this->dineroTotal - $num;
                return $num;
            }else {
                $error = "Error: No puedes apostar mas de lo que tienes total.";
                return $error;
            }
            
        }
        // private function plantarse() {}
        // private function retirarse() {}
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

        private function cambiarAS($num) {
            if ($num == 1){
                return $this->numeroCarta = 11;
            }else {
                return "Error: solo puedes modificar el 1 por el 11";
            }
        }
    }  

    class Baraja { 
        private const CANTIDAD = 52;
        private $barajaCartas = array();
        
        
        public function __construct(){
            $J  = 10;
            $Q  = 10;
            $K  = 10;
            $AS = 11;

            for ($i=0; $i<4; $i++){
                for ($j=0; $j<13; $j++){
                    if ($j >= 10){
                        $barajaCartas[] = new Carta($j);
                    }else{
                        $barajaCartas[] = new Carta($j);
                    }
                }
                $j = 0;
            }
        }

        function repartir(){
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

    

    function otraCarta(){
        $num = rand(1, 13);
        $carta = new Carta($num);
        return $carta;
    }

    function terminar(){
        return true;
    }

    // -------- programa ---------
    
    $baraja = new Baraja();
    $baraja->repartir(); // 2 al jugador
    // repartir 2 cartas a cada uno

    // $respuesta = true/false 
  
    // poner algo para que la maquina termine si le toca entre 17 y 21
    // primero juega el usuario y luego la maquina
    // hacer el juego paso a paso

    


    
?>