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
            setcookie("cookieHttponly", "Marco httponly", time() -1, '/', 'localhost', false, false);
            header("Location:menu.php");
        ?>
    </body>