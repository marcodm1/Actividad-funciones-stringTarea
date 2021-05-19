<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
	</head>
	<body>
	<?php	
        require_once("./controlador/controlador.php");

        echo "<pre>";
        print_r($resultado);
        echo "</pre>";

        // $resultado = $conexion->createP();
        // $resultado = $conexion->deleteP();
        // $resultado = $conexion->readP("todos");
        // echo "<pre>";
        // print_r($resultado);
        // echo "</pre>";
    ?>
</body>
</html>