<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="tema 7 ej3">
</head>
<body>
<?php
    $errores  = array();
    if (empty($_SESSION['login1']) || empty($_SESSION['clave1']) || empty($_SESSION['conexion'])) {
        header("Location:ejercicio3.php");
    }
    if (!empty($_POST['formulario'])) {
        if (empty($_POST['login2'])) {
            $error = "Error: Está vacio el campo login2";
            array_push($errores, $error);
        }
        if (empty($_POST['clave2'])) {
            $error = "Error: Está vacio el campo clave2";
            array_push($errores, $error);
        }

        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo $error;
            }
            formularioModificacion();
        }else {
            $conexion = $_SESSION['conexion'];
            $conexion->modificarUsuarios($login,$clave);
            header("Location:ejercicio3.php");
        }
    }else {
        formularioModificacion();
    }
    
    function formularioModificacion() {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            <label for="log2">Escriba el login nuevo:</label>
                <input type="text" name="login2" id="log2" ><br><br>
            <label for="clave2">Escriba la clave nuevo:</label>
                <input type="password" name="clave2" id="clave2" ><br><br>

            <input type="submit" name="formulario" value="Modificar">
        </form>
        <?php   
    }
    ?>  
</body>
</html>