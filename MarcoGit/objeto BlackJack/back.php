<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlackJack</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        session_start();


        if (!empty($_POST['otraP'])) {
            if ($_POST['otraP'] == "si") {
                header("Location:registro.php");
            }else {
                header("Location:cerrar.php");
            }
        }

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
        class Casino {
            private $manoCasino     = array();
            private $manoCasinoIMG  = array();
            private $listaJugadores = array();

            public function __construct($cartasMano, $listaJugadores){
                $this->manoCasino     = $cartasMano;
                $this->listaJugadores = $listaJugadores;
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
        }
        // metodos -------------------------------------------------------
        function otraCarta(){
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
        function juegaCasino($miCasino, $miJugador) {
            if ($miCasino->suma() > 21) { // pierde casino
                comprobarGanador($miCasino, $miJugador);
            }elseif ($miCasino->suma() <= 16) { // pide carta casino
                $miCasino ->setMano();
                juegaCasino($miCasino, $miJugador);
            }else { 
                comprobarGanador($miCasino, $miJugador);
            }
        }
        function añadirCartaAcasino($miCasino) {
            $miCasino->setMano();
        }
        function guardarPartida($miJugador, $miCasino){
            if (empty($_SESSION['jugador'])) {
                $_SESSION['jugador'] = serialize($miJugador); // serializar es como pasar el objeto a string
            }else {
                // unset($_SESSION['jugador']);
                $_SESSION['jugador'] = serialize($miJugador);
            }
            if (empty($_SESSION['casino'])) {
                $_SESSION['casino'] = serialize($miCasino);
                }else {
                    unset($_SESSION['casino']);
                    $_SESSION['casino'] = serialize($miCasino);
                }
        }
        function volveraJugar() {
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
        function comprobarGanador($miCasino, $miJugador) {
            if ($miCasino->suma() > 21) {
                echo "El casino se ha pasado con ";
                foreach ($miCasino->getManoIMG() as &$valor) {
                    ?>
                   <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                   <?php
                }
                ?>
                <br><br>
                <?php
                echo "Tu ganas:";
                foreach ($miCasino->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                volveraJugar();
            }elseif ($miCasino->suma() == $miJugador->suma()) {
                echo "El casino tiene:";
                foreach ($miCasino->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas1" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                    ?>
                    <br><br>
                    <?php
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                volveraJugar();
            }elseif ($miCasino->suma() < $miJugador->suma()) {
                echo "El casino tiene:";
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png"><br><br>
                    <?php
                }
                ?>
                <br><br>
                <?php
                echo "Has ganado!";
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                volveraJugar();
            }else {
                echo "El casino tiene:";
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                ?>
                <br><br>
                <?php
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                echo "Has perdido!";
                volveraJugar();
            }
        }
        function comprobar($miJugador, $miCasino) {
            ?>
            <div class="resultado">
            <?php
            if ($miJugador->suma() > 21) {
                echo "Tienes mas de 21, pierdes";
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                volveraJugar();
            }elseif ($miJugador->suma() == 21) {  // puede que no haga falta
                echo "El casino empieza con:";
                foreach ($miCasino->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas1" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                ?>
                <br><br>
                <?php
                echo "Tu tienes: BlackJack!";
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                volveraJugar();
            }else {
                echo "El casino empieza con:";
                foreach ($miCasino->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas1" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                ?>
                <br><br>
                <?php
                echo "Tu tienes:";
                foreach ($miJugador->getManoIMG() as &$valor) {
                    ?>
                    <img name="cartitas" src="baraja/corazones/<?php $valor?>.png">
                    <?php
                }
                otraCarta();
            }

            ?>
            </div>
            <?php
        }
    
                // main: programa
        if (empty($_SESSION['jugador'])) { 
            $cartasEnLaMano = array();
            $miJugador      = new Jugador($cartasEnLaMano);
            $arrayJ         = array();
            $arrayJ[]       = $miJugador;
            $miCasino       = new Casino($cartasEnLaMano, $arrayJ);
            $miJugador->setMano();
            $miCasino ->setMano(); 
            $miJugador->setMano(); 
            $miCasino ->setMano();
        }else {
            $miJugador = unserialize($_SESSION['jugador']); // serialize convierte objeto a string
            $miCasino  = unserialize($_SESSION['casino']);
        }
        ?>  
        <div class="juegoDIV">
        <?php
        if (empty($_POST['otra'])) { // 1ª vez que pasa por aqui
            guardarPartida($miJugador, $miCasino);
            comprobar($miJugador, $miCasino);
        }else {
            if ($_POST['otra'] == "si"){// si queire otra carta...
                $miJugador->setMano(); // 3ª carta
                guardarPartida($miJugador, $miCasino);
                comprobar($miJugador, $miCasino);
            }else { 
                juegaCasino($miCasino, $miJugador);
            } 
        } 
    ?> 
    </div>   
</body>
</html>