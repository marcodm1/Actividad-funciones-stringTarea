<!DOCTYPE html>
<html lang="es">
	<head>
			<title> Plantilla</title>
			<meta charset="UTF-8">
			<meta name="description" content="Plantilla">
			<meta name="author" content="Laura">
			<?php

				/* Crear cookies */
				setcookie("apellidos", "Pérez", time()+3600, '/p005/privada');
			?>
	</head>
	<body>
	
	<?php
	if (!empty($_COOKIE['apellidos'])){
		echo "La cookie apellidos está disponible: ".$_COOKIE['apellidos']. "<br>";
	}else{
		echo "La cookie apellidos NO está disponible <br>";
	}
	?>
</body>
</html>