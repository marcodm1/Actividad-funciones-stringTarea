<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
        <link rel="stylesheet" href="../estilo.css">
	</head>
	<body>
        <?php 
            foreach ($errores as $error) {
                echo $error . "<br>"; 
            }
        ?>
    </body>
</html>