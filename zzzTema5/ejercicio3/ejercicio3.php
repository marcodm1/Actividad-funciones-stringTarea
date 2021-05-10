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
            - Comprobar que existe el subdirectorio fotos.
            - Leer el contenido del subdirectorio fotos, obtener solo los archivos jpg.
            - El ejercicio debe ser genérico.- 
            - Mostrar las imágenes en una tabla de dos columnas.
            - La tabla debe ser correcta en html.
            Sugerencia uso de: 
            is_dir().
            glob() o scandir().
            Voluntario: 
            - Mejora, permitir que el usuario decida por GET cuántas columnas tiene la tabla. Este número será positivo y como máximo 5, sino mostrar la tabla con 2 columnas.
            */

            $fichero = "./img/";

            if (is_dir($fichero)) { // comprueba si es un fichero o directorio
                $listado = glob($fichero . "*.jpg"); // Busca coincidencias de nombres de ruta con un patrón
                
                ?>
                <table>
                    <tr>
                        <th colspan="2"> Fotos: </th>
                    </tr>
                    <?php
                        $fotos = count($listado);
                        for ($i = 0; $i < $fotos; $i++) {
                            if ($fotos%2 != 0 && $i == $fotos -1) {
                                ?>
                                <tr>
                                <td><img src="<?php echo $listado[$i]; ?>" width="100" height="100" alt="perro"></td>
                                <td></td>
                                </tr>
                                <?php
                            }else {
                                ?>
                                <tr>
                                <td><img src="<?php echo $listado[$i]; ?>" width="100" height="100" alt="perro"></td>
                                <td><img src="<?php echo $listado[$i+1]; ?>" width="100" height="100" alt="perro"></td>
                                </tr>  
                            <?php
                            $i ++;
                            }
                        }
                           
                        ?>
                </table>
                <?php
            }else {
                echo "No existe el subdirectorio seleccionado";
            }

            // fclose($fichero);

            

        ?>
    </body>
</html>


