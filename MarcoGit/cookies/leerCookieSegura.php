<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio cookie">
        
	</head>
	<body>
        <?php
            if (!empty($_COOKIE['apellidos'])){
                echo "La cookie apellidos = ".$_COOKIE['apellidos']. "<br>";
                echo "<script> alert(document.cookie); </script>";
            }else{
                echo "La cookie NO está disponible <br>";
            }
	    ?>
        <a href="menu.php"> Volver al menu</a><br> 
    </body>
</html>