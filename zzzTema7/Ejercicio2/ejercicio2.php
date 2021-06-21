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
    if (!$conexion = mysqli_connect("localhost", "alumno", "1234", "dwes2")) {
        echo "Error: conexión fallida " . mysqli_connect_error() . "<br>";       
        die();
    }else {
        echo "Conexión correcta" . "<br>";
    }

    if (!$conexion->set_charset("utf8")) {
        echo "Error: no es posible cambiar el juego de caracteres " . $conexion->error . "<br>";
    }

    $sentencia = "SELECT * FROM usuarios";
    if ($consulta = $conexion->real_query($sentencia)) {
        $resultado = $conexion->store_result();
        $numFilas  = $resultado->num_rows;
        echo "Numero de filas: " . $numFilas . "<br>";
        $resultado->data_seek(mysqli_num_rows($resultado) -1);
        $resultados = $resultado->fetch_assoc();
        echo "Login: " . $resultados['login'] . "<br>";
        echo "Clave: " . $resultados['clave'] . "<br>";
        $resultado->free();
    }else{
        echo "Error: Consulta fallida";
    }
    $conexion->close();
?>
</body>
</html>