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

    class Carta implements Juego {
        public function g(){}

        private $numero;

        // private $color;
        // private $figura; 
        // private $as;
        // private $palo;
        // metodos();

        public function __construct($num){
        $this->numero = $num;
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

    function baraja() { // ponerlo a lo mejor como class posibles metodos repartir mezclat etc...
        $bajara = array ();
        for ($i=0; $i<52; $i++){
            $baraja[$i] = otraCarta();
        }
        return $baraja;
    }



    // -------- programa ---------
    
    // $respuesta = true/false 
  
    // poner algo para que la maquina termine si le toca entre 17 y 21
    // primero juega el usuario y luego la maquina
    // hacer el juego paso a paso

    


    
?>