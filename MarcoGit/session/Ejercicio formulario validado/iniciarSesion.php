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
            if (isset($_POST['nombre']) && isset($_POST['contrasenia']) ){
                session_start();
                $_SESSION['nombre']      = $_POST['nombre'];
                $_SESSION['contrasenia'] = $_POST['contrasenia'];
            }
        ?>

        <form action="http://localhost/PHP-GIT/MarcoGit/session/Ejercicio%20formulario%20validado/segundaSesion.php" method="post">
        <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
            <input type="text" name="nombre" id="txtNombre"><br><br>

        <label for="gg"><strong>Escriba su contraseña:</strong></label>
            <input type="password" name="contrasenia" id="gg" ><br><br>

        <input type="submit" value="enviar">
            
    </body>
    
</html>


