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
        $msg1 = "mensaje 1";
        $msg2 = "mensaje 2";
        $msg3 = "mensaje 3";
        $msg4 = "mensaje 4";

        $numero = mt_rand(1, 4);

        $variable = 'msg' . $numero; // $variable = msg1
   
        echo $$variable . "<br>"; // $$a ("hola");

        


        $a  = "hola";    // $a = "hola;
        $$a = "mundo";   // $hola = "mundo";
        echo "$a ${$a} ";// "hola mundo";
        echo "$a $hola" . "<br><br>"; // igual que linea anterior


        $saludo_es = "hola";
        $saludo_en = "hello";
        $saludo_de = "hallo";
        
        $_GET['idioma'] = "es";
        
        $variable = "saludo_" . $_GET['idioma'];
        echo $variable  . "<br>"; // variable = "saludo_es"
        echo $$variable . "<br>"; // $saludo_es, que es "hola"

         
	?>
	</body>
</html>