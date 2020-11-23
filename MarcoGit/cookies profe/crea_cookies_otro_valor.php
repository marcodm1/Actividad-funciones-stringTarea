<!DOCTYPE html>
<html lang="es">
	<head>
			<title> Plantilla</title>
			<meta charset="UTF-8">
			<meta name="description" content="Plantilla">
			<meta name="author" content="Laura">
			<?php

				/* Crear cookies */
				setcookie("nombre", "Pepe");
			?>
	</head>
	<body>
	
	<a href="lee_cookies.php" > Accede al sistema.</a>
	<?php
	if (!empty($_COOKIE['nombre'])){
		echo "La cookie nombre está disponible: ".$_COOKIE['nombre']. "<br>";
	}
	?>
</body>
</html>