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
       
            if (!isset($_POST['name']) && !isset($_POST['password'])){
                mostrarFormulario();
            }else {
                $name      = $_POST['name'];
                $password  = $_POST['password'];
                require_once("ConectaBD.php");
                $consulta  = ConectaBD::singleton();
                $resultado = $consulta->comprobarUsuario($name, $password);
                setcookie("name", $_POST['name'], time() +3600);
                header("Location:menu.php");
            }

            function mostrarFormulario(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="txtNombre"><strong>Nombre:</strong></label>
                            <input type="text" name="name" id="txtNombre"><br><br>

                        <label for="pwd"><strong>Contraseña:</strong></label>
                            <input type="password" name="password" id="pwd"><br><br>

                        <input type="submit" value="enviar">
                    </form> 
                <?php
            }
        ?>
        
    </body>
</html>