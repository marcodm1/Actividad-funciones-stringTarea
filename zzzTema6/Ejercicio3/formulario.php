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
        formulario();
       
        function formulario() {
            ?>
                <form action="juego.php" method="get">
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

                    <input type="submit" value="enviar">
                </form>
            <?php   
        }
       ?> 

    </body>
</html>

