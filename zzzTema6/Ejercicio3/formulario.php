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
    if (!empty($_GET['enviado'])) {
        if (empty($_GET['nombre1']) || empty($_GET['apellido1']) || empty($_GET['nombre2']) || empty($_GET['apellido2']) ) { 
            $error = array();
            if (empty($_GET['nombre'])) {
                $error1 = 'No ha rellenado el campo: "Nombre"';
                array_push($error, $error1);
            }
            if (empty($_GET['edadmas']) ) {
                $error2 = 'No ha seleccionado campo: "Es mayor o menor de 18 años":';
                array_push($error, $error2);
            }
            if (!empty($error)) {
                echo "<pre>";
                print_r($error);
                echo "</pre";
            }
            formulario();
        }else {
            require_once("juego.php");
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

