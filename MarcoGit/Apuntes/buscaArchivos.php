<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Seleccionar archivo">
	</head>
	<body>
         
        <?php 
        if (isset($_POST["enviar"]) ) {
            // procesar formulario...
            echo "Ha seleccionado un fichero. <br>";
            //lo ordena con el pre
            echo "<pre>";
            print_r($_POST);
            print_r($_FILES);
            echo "</pre>";

            // si se ha subido fichero.
            if (is_uploaded_file($_FILES['nombreFichero']['tmp_name'])){
                // indicamos donde vamos a enviarlo
                $direccion = "C:\\xampp\\CarpetaPHP\\";
                // $_FILES es un array que contiene una posicion nombreFichero, y ahi hay otro array
                // que siempre tiene 5 posiciones, [name][type][tmp_name][error][size]
                $nombreFichero = $_FILES['nombreFichero']['name'];
                // concatena nombres de directorio y fichero
                $nombreCompleto = $direccion . $nombreFichero;
                // existe el fichero?
                if (is_file($nombreCompleto) ) {
                    // pone como nombre de fich: marca tiempo - nombre fichero subido
                    $idUnico = time();
                    //mueve el fichero subido a su ubicacion definitiva
                    $nombreFichero = $idUnico . "-" . $nombreFichero;
                }
                    move_uploaded_file($_FILES['nombreFichero']['tmp_name'], $direccion . $nombreFichero);
            }else{
                print("No se ha podido subir el fichero/n");
            }
            
        }else{
            //mostrar Formulario
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <label for="fichero">Selecciona un fichero:</label><br><br>
                    <input type="file" name="nombreFichero" id="fichero" required="required"><br><br>
                    <input type="submit" value="enviar" name="enviar"><br><br>
                </form>
            <?php
        }

        ?>
    </body>
</html>