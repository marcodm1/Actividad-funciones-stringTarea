<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados.">
	</head>
	<body>
    <?php
    if (!empty($_POST['enviado'])) {
        if (empty($_GET['nombre1']) || empty($_GET['apellido1']) || empty($_GET['nombre2']) || empty($_GET['apellido2']) ) { 
            // hacer comprobaciones de uno por uno para avsar al usuario cual es el error, asi que tengo que hacer un array con errores
            echo "Aqui mostrar cada campo que no se ha rellenado";
            formulario();
        }else {
            session_start();
            $_SESSION['jugador1Nombre']   = $_GET['nombre1'];
            $_SESSION['jugador1Apellido'] = $_GET['apellido1'];
            $_SESSION['jugador2Nombre']   = $_GET['nombre2'];
            $_SESSION['jugador2Apellido'] = $_GET['apellido2'];
            // session_destroy();
            Header("Location:juego.php");
        }
    }else {
        formulario();
    }
        
       
        function formulario() {
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                    <strong>Participante 1: </strong><br>
                    <label for="txtNombre1">Escriba su nombre:</label>
                        <input type="text" name="nombre1" id="txtNombre1" ><br><br>

                    <label for="txtApellido1">Escriba su apellido:</label>
                        <input type="text" name="apellido1" id="txtApellido1" ><br><br>

                    <strong>Participante 2: </strong><br>
                    <label for="txtNombre2">Escriba su nombre:</label>
                        <input type="text" name="nombre2" id="txtNombre2" ><br><br>

                    <label for="txtApellido2">Escriba su apellido:</label>
                        <input type="text" name="apellido2" id="txtApellido2" ><br><br>

                    <input type="submit" name="enviado" value="enviar">
                </form>
            <?php   
        }
       ?> 

    </body>
</html>

