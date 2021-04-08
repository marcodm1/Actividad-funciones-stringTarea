<!DOCTYPE html>
<html lang="es">
	<head>
	<title>Marco Domínguez</title>
        <meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados.">
	</head>
	<body>
                <?php 
                        $a  = "hola";    // $a = "hola;
                        $$a = "mundo";   // $hola = "mundo";
                        echo "$a ${$a} ";// "hola mundo";
                        echo "$a $hola" . "<br><br>"; // igual que linea anterior
                ?>
	</body>
</html>