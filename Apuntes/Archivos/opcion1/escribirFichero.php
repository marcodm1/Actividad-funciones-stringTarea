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
            //r Solo Lectura
            //w Solo Escritura (sobreescribiendo encima de la informacion si la hubiese)
            //a Añadir al final (solo Escritura, coloca puntero al fichero al final del fichero y sí existe contenido lo mantiene)
            //r+ , w+ y a+ actúan igual que r , w y a con la diferencia que abren para Lectura y Escritura
        //"include_path" Con valor true indica que también se debe buscar el fichero en la lista de directorios de la directiva include_path(php.ini);


        $file_name = "prueba.txt";
        $fichero = @fopen($file_name, 'w'); 
        // comprobar si se ha abierto correctament
        if ($fichero){
            $texto = ['primer añadido', 'segunda linea', 'tercera linea'];

            foreach ($texto as $linea){
                fwrite ($fichero, $linea .PHP_EOL);
            }
         
            //cerrar
            if (fclose($fichero)){
                echo "el fichero se ha cerrado correctamente <br>";
            }
        }

        ?>
    </body>
</html>