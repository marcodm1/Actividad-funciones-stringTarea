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
            setcookie("cookieSegura", "Marco Segura", time() +60, '/', 'localhost', true); // si pongo ./ deberia de ser esta carpeta sola
            // el true final es para que solo la cree si stoy en modo seguro, es decir https:
            header("Location:menu.php");
        ?>
    </body>
</html>

