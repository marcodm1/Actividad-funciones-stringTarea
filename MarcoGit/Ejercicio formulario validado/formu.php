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
            $errores = false;
            $respuesta = false;

            if (isset($_POST['nombre']) && isset($_POST['contrasenia']) ){
                if (strlen($_POST['nombre']) >= 5 && strlen($_POST['contrasenia']) >= 5){
                    session_start();
                    $_SESSION['nombre']      = $_POST['nombre'];
                    $_SESSION['contrasenia'] = $_POST['contrasenia'];
                    mostrarDatos();
                    echo "<br>Quieres desconectarte ?<br>"
                    ?>
                        <a href="cerrar.php"> Desconectarte</a><br> 
                    <?php

                    //session_destroy();
                }else {
                    $errores = true;
                    echo "Usuario o contraseña demasiado cortos.<br>";
                    mostrarFormulario();
                }
            }else {
                    mostrarFormulario();
            }



            function mostrarFormulario( ){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                        <input type="text" name="nombre" id="txtNombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                    <label for="gg"><strong>Escriba su contraseña:</strong></label>
                        <input type="password" name="contrasenia" id="gg" ><br><br>
                    <input type="submit" value="enviar">
                <?php
            }

            function mostrarDatos(){
                echo "Nombre: "     . $_POST['nombre'] . "<br>";
                echo "Contraseña: " . $_POST['contrasenia'];
            }
        ?>
    </body>
</html>