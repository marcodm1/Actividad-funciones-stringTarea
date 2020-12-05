<!-- 
El juego es el Black Jack, un juego de cartas que consiste
en acercarse lo maximo posible a 21 sin pasarte, todas las figuras
cuentan 10 puntos y el 1 cuenta 1 u 11
definir UML de las clases -->
<!-- // implementar si hace falta la interfaz Juego -->
<?php
    include "interface.php";

    if (isset($_POST['nombre'])){
    }else{
        header("Location:menu.php");
    }

    class Carta {
        private $numeroCarta;

        // private $figura; 
        // private $as;
        // private $palo;
        // metodos();

        public function __construct($numeroCarta){
            $this->numeroCarta = $numeroCarta;
        }
    }  

    class Baraja { 
        private const CANTIDAD = 52;
        private $barajaCartas = array();
        // metodos repartir mezclar
        
        public function __construct(){
            for ($i=0; $i<4; $i++){
                for ($j=0; $j<13; $j++){
                    $barajaCartas[] = new Carta($j);
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