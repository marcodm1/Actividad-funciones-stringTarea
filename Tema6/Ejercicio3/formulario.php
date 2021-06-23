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
        $errores = array();
        if (!empty($_GET['enviado'])) {
            if (empty($_GET['nombre1'])){
                $error = "<br>Error: No ha rellenado el nombre1.<br>";
                array_push($errores, $error);
            }
            if (empty($_GET['apellido1'])){
                $error = "<br>Error: No ha rellenado el apellido1.<br>";
                array_push($errores, $error);
            }
            if (empty($_GET['nombre2'])){
                $error = "<br>Error: No ha rellenado el nombre2.<br>";
                array_push($errores, $error);
            }
            if (empty($_GET['apellido2'])){
                $error = "<br>Error: No ha rellenado el apellido2.<br>";
                array_push($errores, $error);
            } 
            if (!empty($errores)) {
                formulario();
                echo "<pre>";
                print_r($errores);
                echo "</pre";
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

