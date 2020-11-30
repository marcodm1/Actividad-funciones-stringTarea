<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author"      content="Marco Dominguez">
        <meta name="description" content="examen Ej: 2">
	</head>
	<body>
    <?php 
        $errores = false;
        $listaErrores = array();

        if (isset($_POST['fichero'])){
            $nombre = "fichero.txt";
            $fichero = @fopen($nombre, 'r'); 
            if ($fichero){
                while ($linea = fgets($fichero)){
                    echo "$linea <br>";
                }
                if (fclose($fichero)){
                    echo "el fichero se ha cerrado correctamente <br>";
                }
            }else {
                $errores = true;
                $listaErrores[] = "Error: no se ha leido el fichero correctamente."
            }
       }else {
            $errores = true;
            $listaErrores[] = "Error: no se ha pasado el fichero."
       }
           
        



        ?>
        
    </body>
</html>