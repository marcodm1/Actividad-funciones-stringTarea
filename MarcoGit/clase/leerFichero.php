<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="...">
	</head>
	<body>
        <?php 
        //fopen( string fichero, string modo [, bool include_path = false ] ); //para abrir un fichero

        // "fichero" = nombre del fichero. Ej. $f1 = fopen( "d:\\misapuntes\\php.txt", "r");
        // "modo" = modo de apertura
            //r Solo Lectura ( coloca puntero al fichero al principio del fichero)
            //w Solo Escritura (coloca puntero al fichero al principio del fichero y sí existe contenido lo elimina)
            //a Añadir al final (solo Escritura, coloca puntero al fichero al final del fichero y sí existe contenido lo mantiene)
            //r+ , w+ y a+ actúan igual que r , w y a con la diferencia que abren para Lectura y Escritura
        //"include_path" Con valor true indica que también se debe buscar el fichero en la lista de directorios de la directiva include_path(php.ini);

            // Ej: lectura de archivo
        $file_name = "prueba.txt";
        $fichero = @fopen($file_name, 'r'); 
        // comprobar si se ha abierto correctament
        if ($fichero){
            //procesar
            while ($linea = fgets($fichero)){
                echo "$linea <br>";
            }
            //cerrar
            if (fclose($fichero)){
                echo "el fichero se ha cerrado correctamente <br>";
            }
        }


        // Ej: escribir en el archivo
        $file_name = "prueba.txt";
        $fichero = @fwrite($file_name, 'w'); 
        // comprobar si se ha abierto correctament
        if ($fichero){
            //procesar
            while ($linea = fgets($fichero)){
                echo "$linea <br>";
            }
            //cerrar
            if (fclose($fichero)){
                echo "el fichero se ha cerrado correctamente <br>";
            }
        }

        ?>
    </body>
</html>