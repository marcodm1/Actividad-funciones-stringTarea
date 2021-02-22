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
                // nuevos cambios:
        // la clase jugador y casino, son singlton
        // hay que llamar a la clase jugador y a la clase casino independientemente.
        // los metodos de otraCarta(), juegaCasino(), añadirCartaCasino(), 
        // comprobar(), comprobarGanador(), volveraJugar(), estan en la clase casino 
        // guardar partida, esta desactivado, y posiblemente pasado a conectBD.php

        // repartir cartas con sleep(cantidadSegundos);

        session_start();

        if (!empty($_POST['otraP'])) {
            if ($_POST['otraP'] == "si") {
                header("Location:registro.php");
            }else {
                header("Location:cerrar.php");
            }
        }

             
        if (empty($_SESSION['jugador'])) {
            
            $cartasMano = array();
            $miJugador  = new Jugador($cartasMano);
            $arrayJ     = array();
            $arrayJ[]   = $miJugador;
            $miCasino   = new Casino($cartasMano, $arrayJ);
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