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
    if (!empty($_GET['formulario']) ) {
        switch ($_GET['formulario']) {
            case "Añadir":
                require_once("../vista/vCreate.php");
                break;
            case "Ver":
                require_once("../modelo/conectaBD.php");
                $conexion  = ConectaBD::singleton();
                $resultado = $conexion->readP();
                require_once("../vista/vRead.php");
                break;
            case "Modificar":
                require_once("../vista/vUpdate.php");
                break;
            case "Eliminar":
                require_once("../vista/vDelete.php");
                break;
            case "←":
                require_once("./index.php");
                break;
            default:
                $error = "No ha seleccionado nada";
                require_once("../vista/vError.php");
        }
    }else {
        formularioOpcion();
    }



    function formularioOpcion() {
        ?>
        <form action="./controlador/cOption.php" method="get">
            <br><strong>Elija una opción: </strong><br><br>
                <input type="submit" name="formulario" value="Añadir">-
                <input type="submit" name="formulario" value="Ver">-
                <input type="submit" name="formulario" value="Modificar">-
                <input type="submit" name="formulario" value="Eliminar"><br>
                un usuario
            </form>
        <?php
    }
?>
</body>
</html>