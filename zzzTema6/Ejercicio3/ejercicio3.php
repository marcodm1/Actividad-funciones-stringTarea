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
        private $jugadorA;
        private $jugadorB;
        private $premio;
      
        public function __construct($jugadorA, $jugadorB, $premio) {
            $this->jugadorA = $jugadorA;
            $this->jugadorB = $jugadorB;
            $this->premio   = $premio;
        }

        public function jugada() {

        }

        public function getGanador($jugadorA, $jugadorB){ //devuelve el participante que ha ganado.
            if ($jugadorA > $jugadorB) {
                return "El jugador A ha ganado.";
            }else {
                return "El jugador B ha ganado.";
            }

            if ($jugadorA == $jugadorB) {
                return "Ha sido un empate.";
            }
        } 

    }

    class JuegoDados extends Juego {
        private $jugadorA;
        private $jugadorB;
        private $premio;
      
        public function __construct($jugadorA, $jugadorB, $premio) {
            parent::__construct($nombre, $apellidos, $puntos); 
            $this->jugadorA = $jugadorA;
            $this->jugadorB = $jugadorB;
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
    

    $pepe = new Participante("Pepe", "Pérez",  0);
    $juan = new Participante("Juan", "García", 0);
?>