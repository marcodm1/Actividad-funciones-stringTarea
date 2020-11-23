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
	if (!empty($_COOKIE['nombre'])){
        echo "La cookie nombre = ".$_COOKIE['nombre']. "<br>";
        echo "<script> alert(document.cookie); </script>";
	}else{
		echo 'No existe la cookie nombre<br>';
	}
	?>
	<a href="menu.php"> Volver al menu</a><br> 

	
</body>
</html>