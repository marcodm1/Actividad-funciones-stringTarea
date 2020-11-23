<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio cookie">
        
	</head>
	<body>
        <a href="crearCookie.php"> Crea cookie</a><br> 
        <a href="borrarCookie.php"> Borra cookie</a><br>
        <a href="crearCookieSegura.php"> Crear cookie segura</a><br> 
        <a href="borrarCookieSegura.php"> Borrar cookie segura</a><br> 
        <a href="leerCookie.php"> Leer cookie </a><br> 
        <a href="leerCookieSegura.php"> Leer cookie segura</a><br>

        <?php 
            // comprobamos si la cookie esta disponible
            if (!empty($_COOKIE['nombre']) ) {
                echo "La cookie nombre esta disponible: " . $_COOKIE['nombre'] . "<br>";
            }else{
                echo "no existe la cookie nombre <br>";
            }
            // probar a hacer una carpeta privada y guardarla  y no se que creo que 
            // es asi, eje: setcookie("nombre", "Marco", time() +3600, '/', 'localhost')
        ?>
    </body>
</html>