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
            <form action="../controlador/cUpdate.php" method="get">
            <br><strong>Modificación de un usuario: </strong><br><br>
                <label for="l1">¿Login para modificar?</label>
                    <input type="text" name="login1" id="l1" ><br><br>
                <label for="l2">Escriba el nuego login:</label>
                    <input type="text" name="login2" id="l2" ><br><br>
                <label for="c1">Escriba la nueva clave:</label>
                    <input type="password" name="clave" id="c1" ><br><br>
                <input type="submit" name="formulario" >
            </form>
            <form action="../index.php" method="get">
                <input type="submit" value="←">
            </form>
        </div>
</body>
</html>