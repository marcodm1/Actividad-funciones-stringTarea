<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ej x">
	</head>
	<body>
        <?php

            if (!empty($_POST['archivo'])) {
                $fichero =  $_POST['archivo'];
                if (file_exists($fichero)) {
                    $fopen     = fopen($fichero, 'r');
                    $lineas    = file($fichero);
                    $respuesta = array();
                    
                    $pregunta = array();
                    foreach ($lineas as $linea) {
                        $explode = explode("|", $linea);
                        echo "<pre>";
                        print_r($explode); // quitr el print_R
                        echo "</pre>"; 
                        array_push($respuesta, end($explode)); // cambiar el color de las respuestas
                    }
    
                    foreach ($respuesta as $poss => $valor) {
                        echo "<br> <strong>La respeusta correcta de la pregunta " . $poss . " es: " . $valor . "<strong>";
                    }
    
                }else {
                    echo "El archivo especificado, no existe";
                }

            }else {
                formulario();
            }


            function formulario() {
                ?>
                <form action="ejercicio4.php" method="post">
                    <label for="archivo1">Seleccione un archivo:</label>
                        <input type="file"  name="archivo" id="archivo1"><br>
                    <input type="submit" value="Comprobar" name="submit">
                </form>
                <?php
            }
        ?>
    </body>
</html>

<!-- 
    ¿De qué color es la: Madera? blanco|negro|marrón
    ¿De qué color es la: Naranja? blanco|negro|naranja
    ¿De qué color es el: Metal? blanco|negro|gris
    ¿De qué color es el: Cielo? blanco|negro|azúl
 -->
