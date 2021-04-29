<?php

    class Participante {
        private static $contador = 0;
        private $identificador;
        private $nombre;
        private $apellidos;
        private $puntos;
      
        public function __construct($nombre, $apellidos, $puntos) {
            $this->identificador = ++ self::$contador;
            $this->nombre        = $nombre;
            $this->apellidos     = $apellidos;
            $this->puntos        = $puntos;
        }

        //los metodos que sean necesarios

    }

    class Juego {
        private $jugador1;
        private $jugador2;
        private $premio;
      
        public function __construct($jugador1, $jugador2, $premio) {
            $this->jugador1 = $jugador1;
            $this->jugador2 = $jugador2;
            $this->premio   = $premio;
        }

        //jugada no implementado

        getGanador(){ //devuelve el participante que ha ganado.
            $ganador;
            return $ganador;
        } 

    }

    class JuegoDados extends Juego {
        private $jugador1;
        private $jugador2;
        private $premio;
      
        public function __construct($jugador1, $jugador2, $premio) {
            parent::__construct($nombre, $apellidos, $puntos); 
            $this->jugador1 = $jugador1;
            $this->jugador2 = $jugador2;
            $this->premio   = $premio;
        }


        // Redefine el método jugada() en la que los jugadores tirarán un dado y el que tire el dado mayor tendrá 3 puntos más.
        public function jugada() {
            $dadoJ1 = rand(0,6);
            $dadoJ2 = rand(0,6);

            if ($dadoJ1 > $dadoJ2) {
                $dadoJ1 + 3;
            }
            if ($dadoJ1 < $dadoJ2) {
                $dadoJ2 + 3;
            }
        }
    }
    
?>