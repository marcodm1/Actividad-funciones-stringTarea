<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author"      content="Marco Dominguez">
        <meta name="description" content="examen">
	</head>
	<body>
        <?php
            $errores = false;
            $listaErrores = array();

            if (isset($_POST['nombreJuego'])){
               
                if (strpos($_POST['nombreJuego'], " ")){
                    $errores = true;
                    $listaErrores["nombreJuego"] = "Error: el nombre contiene espacios.<br>";
                }

                if (!$errores){
                    session_start();
                    $_SESSION['nombreJuego']    = $_POST['nombreJuego'];
                    $_SESSION['nombreJugador1'] = $_POST['nombreJugador1'];
                    $_SESSION['nombreJugador2'] = $_POST['nombreJugador2'];
                    $_SESSION['tipoBaraja']     = $_POST['tipoBaraja'];
                    $_SESSION['cartasPartida']  = $_POST['cartasPartida'];
                    $_SESSION['totalSuma']      = $_POST['totalSuma'];
                    $_SESSION['eurosApuesta']   = $_POST['eurosApuesta'];
                    $_SESSION['eurosInicio']    = $_POST['eurosInicio'];
                    $_SESSION['paloM']          = $_POST['paloM'];
                    $_SESSION['palo']           = $_POST['palo'];

                    header("Location:juego.php");
                }else{
                    foreach ($listaErrores as &$valor) {
                        echo $valor;
                    }
                    mostrarFormulario();
                }

             
            }else{
                echo "Tiene que rellenar el campo nombre del juego.<br><br>";
                mostrarFormulario();
                }

            function mostrarFormulario(){
                ?>
                
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="nombreJuego">Nombre del juego de cartas:</label>
                    <input type="text" name="nombreJuego" id="nombreJuego" ><br><br>

                <label for="nombreJugador1">Nombre del jugador1:</label>
                    <input type="text" name="nombreJugador1" id="nombreJugador1" minlength="3"><br><br>

                <label for="nombreJugador2">Nombre del jugador2:</label>
                    <input type="text" name="nombreJugador2" id="nombreJugador2" minlength="3"><br><br>

                <label for="tipoBaraja">Cantidad de cartas:</label> 
                    <label for="siete">Siete(7)</label>
                        <input type="radio" name="tipoBaraja" value="10">
                    <label for="diez">Diez(10)</label>
                            <input type="radio" name="tipoBaraja" value="diez" checked><br><br>

                <label for="cartasPartida">Cantidad de cartas/jugador por partida (2-5):</label>
                    <input type="number" name="cartasPartida" id="cartasPartida" min="2" max="5" value="3"><br><br> 

                <label for="totalSumaa">Seleccione el maximo de puntos para no perder:</label>
                    <input type="number" name="totalSuma" id="totalSumaa" value="15"><br><br> 

                <label for="eurosApuesta">Cantidad de euros para apostar por partida:</label> 
                    <input type="number" name="eurosApuesta" id="eurosApuesta" value="5"><br><br>

                <label for="eurosInicio">Cantidad de euros iniciales para ambos jugadores:</label> 
                    <input type="number" name="eurosInicio" id="eurosInicio"><br><br> 

                <label for="paloM"><strong>Seleccione manteniendo tecla (control) sus palos favoritos:</strong></label>
                    <select multiple name="paloM[]" id="paloM"><!-- [] es enviado como array  -->
                        <option value="picas">picas</option>
                        <option value="corazones">corazones</option>
                        <option value="rombos">rombos</option>
                        <option value="treboles">treboles</option>
                    </select><br>

                <label for="palo"><strong>Seleccione su palo para comenzar:</strong></label>
                    <select name="palo[]" id="palo">
                        <option value="picas">picas</option>
                        <option value="corazones">corazones</option>
                        <option value="rombos">rombos</option>
                        <option value="treboles">treboles</option>
                </select><br>

                <input type="submit" value="enviar">

                <?php
            }
        
        ?>
        

    </body>
</html>