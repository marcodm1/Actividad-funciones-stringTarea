<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio 1 dos">
	</head>
	<body>
        <?php

            if(isset($_POST['nombre']) && isset($_POST['contrasenia']) && isset($_POST['check']) && isset($_POST['sexo']) && isset($_POST['asignatura'])){
                echo "Nombre: " . $_POST['nombre'];
                echo "<br>";
                echo "Contraseña: " . $_POST['contrasenia'];
                echo "<br>"; 
                echo "Sexo: " . $_POST['sexo'];
                echo "<br>";
                
                echo "Asignatura 1: ";
                foreach ($_POST['asignatura'] as $asignatura) {
                    echo $asignatura;
                }echo "<br>";
              
                echo "Check: " . $_POST['check'];
                echo "<br>";
                // ejemplo
                // $array = array('lastname', 'email', 'phone'); 
                // $comma_separated = implode(",", $array);
            }
?>
    </body>
</html>



