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
            setcookie("segura", "Marco", time() -1, '/', 'localhost', true, false);
        ?>
        <a href="menu.php"> Volver a index</a><br> 
    </body>
</html>