<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Bloque 3, ejercicio 3">
	</head>
	<body>
        <form action="switch.php" method="get">
            <label for="txtNumero1"><strong>Introduzca el primer numero:</strong></label>
            <input type="number" name="num1" id="txtNumero1" ><br><br>

            <label for="txtNumero2"><strong>Introduzca el segundo numero:</strong></label>
            <input type="number" name="num2" id="txtNumero2" ><br><br>

            <input type="submit" value="enviar"><br><br>
        </form>    
        <?php 
        if(isset($_GET['num1'])){
            $resto = $_GET['num1'] % $_GET['num2'];
            
            switch($resto){
                case 0: echo "Division exacta";
                    break;
                case 1: echo "Sobra 1";
                    break;
                case 2: echo "Sobran 2";
                    break;
                Default: "Sobran mas de 2";
            }
        }    

        ?>
    </body>
</html>