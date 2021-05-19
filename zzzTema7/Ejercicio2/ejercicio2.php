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
        Requisitos previos:
        - Lee el documentos y realiza las prácticas: 05_17_ext_mysqli_2.pdf
        - Consulta: https://www.php.net/manual/es/class.mysqli.php y https://www.php.net/manual/es/class.mysqli-result.php
        - Ejecuta el sql de creación de las tablas y el usuario.
        
        Práctica: 
        - Utilizando mysqli muestra la última fila de la tabla usuarios.
        - Mostrar los datos únicamente del último usuario.
        - Utilizar el usuario alumno
        - Mostrar el error si se produce en la conexión, y en la consulta.

        Pasos: 
        - Conectar con la base de datos //mysqli::connect
        - Establecer el juego de caracteres //mysqli::set_charset
        - Realizar la consulta //mysqli::real_query
        - Obtener los datos de la consulta //mysqli::store_result
        - Obtener el número de filas consultadas //mysqli_result::num_rows
        - Colocar el cursor en la posición adecuada /mysqli_result::data_seek
        - Obtener los datos //mysqli_result::fetch_assoc
        - Mostrar los datos.
        - Liberar espacio //mysqli_result::free o mysqli_result::free_result
        - Cerrar la conexión //mysqli::close
        */
    
        $conexion = new mysqli("localhost", "alumno", "1234","dwes2"); 
        if ($conexion->connect_errno) { 
            echo "Fallo al conectar a MySQL: " . $conexion->connect_error ;
        }else {
            if (!$conexion->set_charset("utf8")) { 
                printf("Error cargando el conjunto de caracteres utf8: %s\n", $conexion->error);
            }
    
            $consulta = "Select * from usuarios"; 
            if (mysqli_query($conexion , $consulta)) {
                $resultadoConsulta = mysqli_query($conexion , $consulta); 
            }else {
                echo "Error al intentar conectarse con la base de datos:";
            }
    
            $totalResultados = mysqli_num_rows($resultadoConsulta); 
    
            // Ajustar el puntero de resultado a una fila concreta
            $resultadoConsulta->data_seek($totalResultados -1);
    
            // obtenemos la fila
            $fila = $resultadoConsulta->fetch_row();
    
            // mostramos la fila
            echo "<pre>";
            print_r($fila);
            echo "</pre>";
            $conexion->close();
        }



    ?>
</body>
</html>