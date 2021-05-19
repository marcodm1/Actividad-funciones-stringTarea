<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio2 unodos">
	</head>
	<body>
        <?php
            /*
            Dado un archivo de preguntas.txt
            Comprobar si existe el fichero.
            En el que cada línea hay una pregunta separada por |. 
            El primer campo es la pregunta, los tres siguientes son las opciones y el último la respuesta correcta.
            Leer el fichero y mostrar las preguntas con el formato que consideres oportuno, la solución debe aparecer de un color distinto.
            No tener en cuenta las líneas en blanco.
            (Sugerencias, leer por líneas y utilizar la función explode.)
            */
            $nombreArchivo = "ejercicio4.txt";
            
            if (file_exists($nombreArchivo)) {
                if (fopen($nombreArchivo, 'r') {
                    $preguntas = explode("|", $archivo, 100);
                    print_r($preguntas);
                }else {
                    echo "Error al abrir el archivo";
                }

            }else {
                echo "El archivo especificado, no existe";
            }
        
    
            
        ?>
    </body>
</html>

