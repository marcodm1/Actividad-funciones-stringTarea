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
       
            if (!isset($_POST['id']) && !isset($_POST['password'])){
                mostrarFormulario();
            }else {
                $id        = $_POST['id'];
                $password  = $_POST['password'];
                require_once("ConectaBD.php");
                $consulta  = ConectaBD::singleton();
                $resultado = $consulta->comprobarUsuario($id, $password);
                if (!$resultado) {
                    echo "Ha introducido mal algun dato";
                    mostrarFormulario();
                }
                setcookie("id", $_POST['id'], time() +3600);
                header("Location:menu.php");
            }

            function mostrarFormulario(){
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <label for="txtId">Id:</label>
                            <input type="text" name="id" id="txtId"><br><br>

                        <label for="pwd">Contraseña:</label>
                            <input type="password" name="password" id="pwd"><br><br>

                        <input type="submit" value="enviar">
                    </form> 
                <?php
            }
        ?>
        
    </body>
</html>