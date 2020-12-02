<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio2 unodos">
	</head>
	<body>

        <?php
            session_start();
            if (isset($_SESSION['permiso']) ){
                
                header("Location:principal.php");
            }
        ?>  
       
        <form action="acreditacion.php" method="post" >
        <label for="txtNombre">Escriba su nombre:</label>
            <input type="text" name="nombre" id="txtNombre"><br><br>

        <label for="gg">Escriba su contraseña:</label>
            <input type="password" name="contrasenia" id="gg"><br><br>

        <input type="submit" value="enviar">
           
    </body>
</html>