<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados(Contraseñas).">
	</head>
	<body>
        <form action="buclesAnidados.php" method="get">
            <label for="txtLongitud"><strong>Escriba longitud de la contraseña:</strong></label>
            <input type="number" name="longitud" id="txtLongitud" ><br><br>
            <label for="txtCantidad"><strong>Escriba la cantidad de contraseñas:</strong></label>
            <input type="number" name="cantidad" id="txtCantidad" ><br><br>     
            <input type="submit" value="enviar"><br><br>
        </form> 
        <?php 
        // me sale el error antes de empezar
            $tabla = array ('t', '2', '€', '7', 'v', '1', '*', '3', 's', '9');
            
            if (isset($_GET['longitud']) && isset($_GET['cantidad'])){
                echo "<ol>";
                for ($i=0; $i<$_GET['cantidad']; $i++){
                    echo "<li>";
                    for ($j=0; $j<$_GET['longitud']; $j++){
                        echo ($tabla[mt_rand(0, 9)]);
                    } 
                    echo "</li>";
                }
                echo "</ol>";
            }
            
        ?>
    </body>
</html>