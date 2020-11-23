<!DOCTYPE html>
<html lang="es">
	<head>
			<title> Plantilla</title>
			<meta charset="UTF-8">
			<meta name="description" content="Plantilla">
			<meta name="author" content="Laura">
			
	</head>
	<body>
	<a href="crea_cookies1h.php"> Crea cookie </a><br><br>
	<a href="borra_cookies1h.php" > Borra cookie.</a><br><br>
	<?php
	
	if (!empty($_COOKIE['nombre'])){
		echo "La cookie nombre está disponible: ".$_COOKIE['nombre']. "<br>";
	}else{
		echo 'No existe la cookie nombre<br>';
	}
	
	?>
</body>
</html>