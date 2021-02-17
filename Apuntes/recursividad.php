<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="recursividad">
	</head>
	<body>
        <form action="recursividad.php" method="get">
            <label for="txtLongitud"><strong>Escriba un numero:</strong></label>
            <input type="number" name="numero" id="txtLongitud" ><br><br>
            <input type="submit" value="enviar"><br><br>
        </form> 
        <?php 
            if(isset($_GET['numero'])){
                $numero = $_GET['numero'];
                echo "El factorial de " . $numero . "= ";
                function recursividad($numero){
                    if($numero <= 1){
                        echo "1<br>";
                        return 1;
                    }
                    echo $numero . " * ";
                    return $numero * recursividad($numero-1); 
                }
                echo recursividad($numero);
            }
        ?>
    </body>
</html>