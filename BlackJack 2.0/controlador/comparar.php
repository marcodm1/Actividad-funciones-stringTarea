<?php

    public function comprobarGanador($miCasino, $miJugador) {
        if ($miCasino->suma() > 21) {
            echo "El casino se ha pasado con ";
            foreach ($miCasino->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            ?>
            <br><br>
            <?php
            echo "Tu ganas:";
            foreach ($miCasino->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            volveraJugar();
        }elseif ($miCasino->suma() == $miJugador->suma()) {
            echo "El casino tiene:";
            foreach ($miCasino->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas1" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
                ?>
                <br><br>
                <?php
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            volveraJugar();
        }elseif ($miCasino->suma() < $miJugador->suma()) {
            echo "El casino tiene:";
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png"><br><br>
                <?php
            }
            ?>
            <br><br>
            <?php
            echo "Has ganado!";
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            volveraJugar();
        }else {
            echo "El casino tiene:";
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            ?>
            <br><br>
            <?php
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
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
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            volveraJugar();
        }elseif ($miJugador->suma() == 21) {  // puede que no haga falta
            echo "Casino:";
            foreach ($miCasino->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas1" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            ?>
            <br><br>
            <?php
            echo "Tu tienes: BlackJack!";
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            volveraJugar();
        }else {
            echo "El casino empieza con:";
            foreach ($miCasino->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas1" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            ?>
            <br><br>
            <?php
            echo "Tu:";
            foreach ($miJugador->getManoIMG() as &$valor) {
                ?>
                <img name="cartitas" src="baraja/corazones/<?php echo $valor;?>.png">
                <?php
            }
            otraCarta();
        }

        ?>
        </div>
        <?php
    }

?>