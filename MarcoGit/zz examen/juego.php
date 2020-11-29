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
            session_start();

            $listaSession = array();
            $listaSession[] = $_SESSION['nombreJugador1'];
            $listaSession[] = $_SESSION['nombreJugador2'];
            $listaSession[] = $_SESSION['tipoBaraja'];
            $listaSession[] = $_SESSION['cartasPartida'];
            $listaSession[] = $_SESSION['totalSuma'];
            $listaSession[] = $_SESSION['eurosApuesta'];
            $listaSession[] = $_SESSION['eurosInicio'];
            $listaSession[] = $_SESSION['paloM'];
            $listaSession[] = $_SESSION['palo'];

            echo $_SESSION['nombreJuego'] . "<br>";
            echo $_SESSION['nombreJugador1'] . "<br>";
            echo $_SESSION['nombreJugador2'] . "<br>";
            echo $_SESSION['tipoBaraja'] . "<br>";
            echo $_SESSION['cartasPartida'] . "<br>";
            echo $_SESSION['totalSuma'] . "<br>";
            echo $_SESSION['eurosApuesta'] . "<br>";
            echo $_SESSION['eurosInicio'] . "<br>";
            print_r($_SESSION['paloM']);
            echo "<br>";
            print_r($_SESSION['palo']);


    
            
        ?>
    </body>
</html>