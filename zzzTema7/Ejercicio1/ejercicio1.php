<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Tema4. Ej1.">
</head>
<body>
    <?php 
    
        // conectarse a esta BBDD con mysqli
        $conexion = new mysqli("localhost", "alumno", "1234","dwes2"); // usamos el usuario alumno
        if ($conexion->connect_errno /*!= 0*/) { // Sí el código de error es distinto de 0
            echo "Fallo al conectar a MySQL: " . $conexion->connect_error ;
        }else {
            // Establece el conjunto de caracteres predeterminado a usar cuando se envían datos desde y hacia el servidor de la base de datos.
            if (!$conexion->set_charset("utf8")) { 
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
            }
            // realiza la consulta a la BBDD
            $consulta = "SELECT * from productos"; 
            if (mysqli_query($conexion , $consulta)) {
                $resultadoCon = mysqli_query($conexion , $consulta); // esto se podria poner asi? --- if ($resultadoCon = mysqli_query($conexion , $consulta)) {
                $totalResultados = mysqli_num_rows($resultadoCon); // devuelve el numero de resultados de la consulta
                mostrarResultados($resultadoCon);
                echo "<br>Total de productos encontrados : " . $totalResultados;
                }else {
                echo "Error al intentar conectarse con la base de datos:";
            }
            $conexion->close();
        }
        


        function mostrarResultados($resultadoCon) {
            ?>
            <table style="border: 2px solid black; background-color: #9BBF9D;">
                <tr><td>Resultado de la busqueda</td></tr>
                <?php
                foreach ($resultadoCon as $fila => $contenido) {
                    ?>
                    <tr  style="border: 1px solid black; background-color: #5EAC63;"><td>
                    <?php echo $fila . ": "; print_r($contenido);
                    ?>
                    </td></tr>
                    <?php
                }
            ?>
            </table>
            <?php
        }


    ?>
</body>
</html>