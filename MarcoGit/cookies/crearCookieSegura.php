<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="cookie segura">
	</head>
	<body>
        <?php 
            setcookie("segura", "Marco", time() +3600, '/', 'localhost', true);
        ?>
        <a href="menu.php"> Volver al menu</a><br> 
    </body>
</html>