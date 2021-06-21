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
    if (!empty($_POST['formulario'])) {
        if (empty($_POST['login1'])) {
            $error = "Error: Está vacio el campo login.";
            array_push($errores, $error);
        }
        if (empty($_POST['clave1'])) {
            $error = "Error: Está vacio el campo clave.";
            array_push($errores, $error);
            if (strlen($_POST['clave1']) < 5){
                $error = "Error: El campo clave tiene que tener mas de 5 letras.";
                array_push($errores, $error);
            }
        }

        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo $error;
            }
            formulario();
        }else {
            require_once("conectaBD.php");
            $conexion = new ConectaBD;
            $conexion->conectarse("localhost","alumno","1234","dwes2");
            $usuarios = $conexion->consultarUsuarios();
            $conexion->muestraTabla($usuarios);

            
            $login = $_POST['login1'];
            $clave = $_POST['clave1'];
            session_start();
            $_SESSION['login1']   = $_POST['login1'];
            $_SESSION['clave1']   = $_POST['clave1'];
            $_SESSION['conexion'] = $conexion;

            if ($_POST['formulario'] == "alta") {
                $conexion->altaUsuarios($login,$clave);
            }else {
                header("Location:modificacion.php");
            }
        }
    }else {
        formulario();
    }
    
    function formulario() {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="log1">Escriba el login:</label>
                <input type="text" name="login1" id="log1" ><br><br>

            <label for="clave1">Escriba la clave:</label>
                <input type="password" name="clave1" id="clave1" ><br><br>

            <input type="submit" name="formulario" value="alta">
            <input type="submit" name="formulario" value="modificacion">
        </form>
        <?php   
    }
    ?>  
</body>
</html>