<?php
    if (!empty($_GET['formulario']) ) {
        $errores = array();
        if (empty($_GET['login1']) ) {
            $error = "No ha rellenado el campo ¿Login para modificar?.";
            array_push($errores, $error);
        }
        if (empty($_GET['login2']) ) {
            $error = "No ha rellenado el campo login.";
            array_push($errores, $error);
        }
        if (empty($_GET['clave']) ) {
            $error = "No ha rellenado el campo clave.";
            array_push($errores, $error);
        }

        if (!empty($errores)) {
            require_once("../vista/vCreate.php");
            require_once("../vista/vErrores.php");
        }else {
            require_once("../modelo/conectaBD.php");
            $login1    = $_GET['login1'];
            $conexion  = ConectaBD::singleton();
            if (!$resultado = $conexion->comprobarUsuario($login1)) {
                require_once("../vista/vUpdate.php");
                $error = "Error: no existe el login indicado.";
                array_push($errores, $error);
                require_once("../vista/vErrores.php");
            }else {
                $login2    = $_GET['login2'];
                $clave     = $_GET['clave'];
                $resultado = $conexion->updateP($login1, $login2, $clave);
                require_once("../vista/vCreate.php");
                require_once("../vista/vResultado.php");
            }
        }
    }else {
        header("Location:../index.php");
    }

?>
            