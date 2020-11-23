<!DOCTYPE html>
<html lang="es">
	<head>
			<title> Plantilla</title>
			<meta charset="UTF-8">
			<meta name="description" content="Plantilla">
			<meta name="author" content="Laura">
			
	</head>
	<body>
	<a href="crea_cookies_subd.php"> Crea cookie </a><br><br>
	<a href="borra_cookies_subd.php" > Borra cookie.</a><br><br>
	<?php
	
	if (!empty($_COOKIE['curso'])){
		echo "La cookie curso está disponible: ".$_COOKIE['curso']. "<br>";
	}else{
		echo 'No existe la cookie curso<br>';
	}
	
	?>
</body>
</html>