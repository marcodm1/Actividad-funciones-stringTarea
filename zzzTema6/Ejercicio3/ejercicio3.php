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

        public function __get($atributo) {
            switch($atributo) {
                case "identificador": 
                    return $this->identificador;
                    break;
                case "nombre": 
                    return $this->nombre;
                    break;
                case "apellidos": 
                    return $this->apellidos;
                    break;
                case "puntos": 
                    return $this->puntos;
                    break;
            }
        }

    }

    abstract class Juego {
        private $jugadorA;
        private $jugadorB;
        private $premio;
      
        public function __construct(Participante $jugadorA, Participante $jugadorB, $premio) {
            $this->jugadorA = $jugadorA;
            $this->jugadorB = $jugadorB;
            $this->premio   = $premio;
        }

        public abstract function jugada(); // funcion no impementada

        public function getGanador(){ // mal: devuelve un jugador
            if ($this->jugadorA->puntos > $this->jugadorB->puntos) {
                return "El jugador A ha ganado un premio de: " . $this->premio;
            }else {
                return "El jugador B ha ganado un premio de: " . $this->premio;
            }

            if ($this->jugadorA == $this->jugadorB) {
                return "Ha sido un empate.";
            }
        } 

    }

    class JuegoDados extends Juego {
      
        public function __construct(Participante $jugadorA, Participante $jugadorB, $premio) {
            parent::__construct($jugadorA, $jugadorB, $premio); 
        }

        public function jugada() {
            $tiradaA = rand(0,6);
            $tiradaB = rand(0,6);

            if ($tiradaA > $tiradaB) {
                $this->jugadorA->puntos + 3;
            }
            if ($tiradaA < $tiradaB) {
                $this->jugadorB->puntos + 3;
            }

            echo "Ha ganado el jugador " . $ganador;
        }
    }
    

    $pepe = new Participante("Pepe", "Pérez",  0);
    $juan = new Participante("Juan", "García", 0);
    echo "Participante 1: " . $pepe->nombre . " " . $pepe->apellidos . " con " . $pepe->puntos . " puntos" . "<br>";
    echo "Participante 2: " . $juan->nombre . " " . $juan->apellidos . " con " . $juan->puntos . " puntos" . "<br>";

    // $juegoDados = new JuegoDados($pepe, $juan);
    
?>