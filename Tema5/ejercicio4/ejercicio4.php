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
            if (!empty($_POST['formulario'])) {
                if (!empty($_POST['archivo'])) {
                    $fichero =  $_POST['archivo'];
                    if (file_exists($fichero)) {
                        $fopen     = fopen($fichero, 'r');
                        $lineas    = file($fichero);
                        $respuesta = array();
                        $pregunta  = array();
                        echo "____________________________<br>";
                        foreach ($lineas as $linea) {
                            $explode = explode("|", $linea);
                            foreach ($explode as $line) {
                                echo $line . "<br>";
                            }
                            echo "<p style='color:blue'>La respuesta correcta es: " . end($explode) . "</p><br><br>";
                            echo "____________________________<br>";
                        }
                    }else {
                        echo "No exise el fichero seleccionado";
                    }
                }else {
                    echo "No ha seleccionado ningún archivo válido";
                }
            }else {
                formulario();
            }


            function formulario() {
                ?>
                <form action="ejercicio4.php" method="post">
                    <label for="archivo1">Seleccione un archivo:</label>
                        <input type="file"  name="archivo" id="archivo1"><br>
                    <input type="submit" value="Comprobar" name="formulario">
                </form>
                <?php
            }
        ?>
    </body>
</html>
