<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio cookie">
        
	</head>
	<body>
        
        <?php 
            if (!empty($_COOKIE['nombre'])){
                mostrarCookies();
            }else {
                echo "No hay cookie (nombre) creadas";
            }

            

            function mostrarCookies(){
                foreach ($_COOKIE as $clave => $valor){
                    echo "$clave => $valor  <br>";
                }
            }
        ?>

        <br><a href="menu.php"> Volver la menu.</a><br>
       
 
    </body>
</html>