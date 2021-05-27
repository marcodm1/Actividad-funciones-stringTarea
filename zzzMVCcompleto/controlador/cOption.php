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
        require_once("./vista/vOption.php");
    }
?>