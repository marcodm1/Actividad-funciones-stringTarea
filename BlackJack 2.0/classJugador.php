<?php
    class Jugador {
        private $manoJugador    = array();
        private $manoJugadorIMG = array();

        public function __construct($manoJugador) {
            $this->manoJugador = $manoJugador;
        }
        public function getMano() {
            return $this->manoJugador;
        }
        public function getManoIMG() {
            return $this->manoJugadorIMG;
        }
        public function setMano() {
            $num = mt_rand(1, 13);
            if ($num == 10 || $num == 11 || $num == 12 || $num == 13) {
                $this->manoJugador[] = 10;
            }else {
                $this->manoJugador[] = $num;
            }  
            $this->manoJugadorIMG[] = $num;
        }
        public function suma() {
            $suma = 0;
            foreach ($this->manoJugador as $valor) {
                $suma += $valor;
            }
            return $suma;
        }
    }

?>