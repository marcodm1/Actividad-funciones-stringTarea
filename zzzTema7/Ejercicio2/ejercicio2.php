<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="">
</head>
<body>
    <?php 
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