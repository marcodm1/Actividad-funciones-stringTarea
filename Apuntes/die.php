<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio bloque 3, ejercicio 2">
	</head>
	<body>
        <form action="die.php" method="get">
            <label for="numero1"><strong>Escribir el dividendo:</strong></label>
            <input type="number" name="num1" id="numero1" ><br><br>

            <label for="numero2"><strong>Escribir el divisor:</strong></label>
            <input type="number" name="num2" id="numero2" ><br><br>

            <input type="submit" value="calcular"><br><br>
        </form>    
        <?php 
        ini_set('scream.enabled', false);
        @$_GET['num1'] && $_GET['num1'] > 0 or die ("Alguno de los numeros es menor de 0");
        @$_GET['num1'] > $_GET['num2']      or die ("Num1 es menor que num2");
        @$_GET['num2'] != 0 or die("es 0");
        echo intdiv($_GET['num1'], $_GET['num2']);
        
   


        ?>
    </body>
</html>



