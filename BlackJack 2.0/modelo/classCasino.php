<?php

class Casino {
    private $manoCasino     = array();
    private $manoCasinoIMG  = array();
    private $listaJugadores = array();

    public function __construct($cartasMano, $listaJugadores){
        $this->manoCasino     = $cartasMano;
        $this->listaJugadores = $listaJugadores;
    }

    public static function singleton(){    
        if (!isset(self::$instancia)) {     
            $miclase = __CLASS__;           
            self::$instancia = new $miclase;
        }
        return self::$instancia; 
    }

    public function getMano() {
        return $this->manoCasino;
    }
    public function getManoIMG() {
        return $this->manoCasinoIMG;
    }
    public function setMano() {
        $num = mt_rand(1, 13);
        if ($num == 10 || $num == 11 || $num == 12 || $num == 13) {
            $this->manoCasino[] = 10;
        }else {
            $this->manoCasino[] = $num;
        } 
        $this->manoCasinoIMG[] = $num;
    }
    public function suma() {
        $suma = 0;
        foreach ($this->manoCasino as $valor) {
            $suma += $valor;
        }
        return $suma;
    }
    public function listaJugadores() {
            return $this->listaJugadores;
    }
    public function añadirAlistaJugadores($listaJugadores) {
            $this->listaJugadores = $listaJugadores;
            return $this;
    }

    public function otraCarta(){
        ?>
            <form class="otraCarta" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        
            <label for="otra"><strong><br>Desea una carta?</strong></label><br>
            <label for="si">si</label>
                <input type="radio" name="otra" value="si">
            <label for="no">no</label>
                <input type="radio" name="otra" value="no">

            <input type="submit" value="enviar">
            
        <?php
    }

    public function juegaCasino($miCasino, $miJugador) {
        if ($miCasino->suma() > 21) { // pierde casino
            comprobarGanador($miCasino, $miJugador);
        }elseif ($miCasino->suma() <= 16) { // pide carta casino
            $miCasino ->setMano();
            juegaCasino($miCasino, $miJugador);
        }else { 
            comprobarGanador($miCasino, $miJugador);
        }
    }

    public function añadirCartaAcasino($miCasino) {
            $miCasino->setMano();
        }

    public function volveraJugar() {
        ?>
            <div class="VJ">
                <form class="volverJugar" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            
                <label for="otraP"><strong><br>Quieres volver a jugar?</strong></label><br>
                <label for="si">si</label>
                    <input type="radio" name="otraP" value="si">
                <label for="no">no</label>
                    <input type="radio" name="otraP" value="no">

                <input type="submit" value="enviar">
            </div>
        <?php
        }


        
}

?>