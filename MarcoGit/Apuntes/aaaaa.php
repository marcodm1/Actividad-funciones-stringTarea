<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio de string con formulario">
    </head>
	<body>
        <form action="EjercicioString.php" method="post">

        Español<input type="checkbox" name="idiomas[]" value="español"><br>
        Ingles <input type="checkbox" name="idiomas[]" value="ingles"><br>
        Frances<input type="checkbox" name="idiomas[]" value="frances"><br>
        Aleman <input type="checkbox" name="idiomas[]" value="aleman"><br>

        <input type="submit" value="enviar"><br><br>
        </form>
        <?php 
            // Convierte la cadena $frase en un array cada espacio
            $frase  = "porción1 porción2 porción3 porción4 porción5 porción6";
            $porciones = explode(" ", $frase);
            echo $porciones[0] . " posicion 0<br>"; 
            echo $porciones[1] . " posicon 1<br>"; 
            
            // Convierte la cadena $frase2 en variables cada espacio
            $frase2  = "porción1 porción2 porción3 porción4 porción5 porción6 porción7";
            list($user, $pass, $uid, $gid, $gecos, $home, $shell) = explode(" ", $frase2);
            echo $user . " usuario<br>"; 
            echo $pass . " contraseña<br>"; 
           
        
            if (strcmp($_SERVER['REQUEST_METHOD'], 'GET') !==0) {
                // prueba de implode
                $cadena = implode (',', $_POST['idiomas']);
                
                echo "<pre>";
                print_r($_POST);
                echo"</pre>";
            
            
            }


        ?>
    </body>
</html>