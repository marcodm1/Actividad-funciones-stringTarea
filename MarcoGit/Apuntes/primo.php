<!DOCTYPE html>
<html lang="es">
    <head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicios bucles 2">
	</head>
	<body>
    <form action="verSiesPrimo.php" method="get">
            <label for="txtMes"><strong>Introduzca un numero:</strong></label>
            <input type="number" name="numero" id="txtMes" ><br><br>
            <input type="submit" value="enviar"><br><br>
        </form>    
        <?php 
            echo ("Ejercicio 1 <br><br>");
            $cont = 2;
            $x = true;

            if(isset($_GET['numero'])){

                echo ("El numero " . $_GET['numero'] . " es primo? ");

                for ($i=2; $i<=$_GET['numero']; $i++){
                    if ($cont == $_GET['numero']){
                        echo "Si <br>";
                    }elseif ($_GET['numero'] % $i == 0){
                        echo "No <br>";
                        break;
                    }else {
                        $cont++;
                        continue;
                    }
                } 
            }
    ?>
</body>
</html>