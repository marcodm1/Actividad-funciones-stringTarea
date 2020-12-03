<!-- 
El juego es el Black Jack, un juego de cartas que consiste
en acercarse lo maximo posible a 21 sin pasarte, y todas las figuras
cuentan 10 puntos y el 1 cuenta 1 u 11
definir UML de las clases -->

<?php
    // implementar si hace falta la interfaz Juego


    class Carta implements A {
        private $numero;
        // private $color;
        // private $figura; 
        // private $as;
        // private $palo;
        // metodos();
      
    }

    public function otraCarta(){
        $num = rand(1, 10);
        $carta = new Carta($num);
        return $carta;
    }

    public function terminar(){
        return true;
    }

    public function baraja() {
        $bajara = array ();
        for ($i=0; $i<52; $i++){
            $baraja[$i] = otraCarta();
        }
    }

    // poner algo para que la maquina termine si le toca entre 17 y 21
    // primero juega el usuario y luego la maquina
    // hacer el juego paso a paso
?>