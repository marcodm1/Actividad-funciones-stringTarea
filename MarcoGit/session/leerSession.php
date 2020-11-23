<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio session">
        
	</head>
	<body>
        <?php
            session_start();

            print_r($_SESSION);
            echo "<br><br>";

            var_dump($_SESSION['nombre']);

            echo "<br>";
        ?>
        <br><a href="menu.php"> Volver al menu</a><br> 

    </body>
</html>