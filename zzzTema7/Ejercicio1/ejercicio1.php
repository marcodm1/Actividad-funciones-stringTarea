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
    /*
    Lee el documentos y realiza las prácticas: 05_16_ext_mysqli_1.pdf
    - Consulta: https://www.php.net/manual/es/class.mysqli.php y https://www.php.net/manual/es/class.mysqli-result.php
    - Ejecuta el sql de creación de las tablas y el usuario.

    Práctica: 
    - Utilizando mysqli realiza la consulta de la tabla productos.
    - Mostrar los datos de los productos en formato tabla.
    - Mostrar la cantidad de productos consultados.
    - Utilizar el usuario alumno para la conexión con la base de datos.
    - Mostrar el error si se produce en la conexión, y en la consulta.

    Pasos: 
    - Conectar con la base de datos //mysqli::connect
    - Establecer el juego de caracteres //mysqli::set_charset
    - Realizar la consulta //mysqli::query
    - Obtener el número de filas consultadas //mysqli_result::num_rows
    - Obtener los datos //mysqli_result::fetch_assoc
    - Mostrar los datos en el formato establecido.
    - Liberar espacio //mysqli_result::free o mysqli_result::free_result
    - Cerrar la conexión //mysqli::close

    Entregar: 
    - Los programas php
    - El script sql con la creación del usuario de acceso a la base de datos y la asignación de los permisos.
    */

        // conectarse a esta BBDD
        $conexion = new mysqli("localhost", "alumno", "1234","dwes2"); 
        if ($conexion->connect_errno /*!= 0*/) { // Sí el código de error es distinto de 0
            echo "Fallo al conectar a MySQL: " . $conexion->connect_error ;
        }

        // Establece el conjunto de caracteres predeterminado a usar cuando se envían datos desde y hacia el servidor de la base de datos.
        if (!$conexion->set_charset("utf8")) { 
            printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
        }

        // realiza la consulta a la BBDD
        $consulta = "Select * from productos;"; 
        if (mysqli_query($conexion , $consulta)) {
            $resultadoCon = mysqli_query($conexion , $consulta); 
        }else {
            echo "Error al intentar conectarse con la base de datos:";
        }
        
        $totalResultados = mysqli_num_rows($resultadoCon); // devuelve el numero de resultados de la consulta
        mostrarResultados($resultadoCon);
        echo "<br>Total de productos encontrados : " . $totalResultados;
        $conexion->close();

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