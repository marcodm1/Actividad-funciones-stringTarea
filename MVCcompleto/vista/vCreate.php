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
        <div>
            <form action="../controlador/cCreate.php" method="get">
            <br><strong>Alta de un usuario nuevo: </strong><br><br>
                <label for="l1">Escriba el login:</label>
                    <input type="text" name="login" id="l1" ><br><br>
                <label for="c1">Escriba la clave:</label>
                    <input type="password" name="clave" id="c1" ><br><br>
                <input type="submit" name="formulario">
            </form>
            <form action="../index.php" method="get">
                <input type="submit" value="←">
            </form>
        </div>
</body>
</html>