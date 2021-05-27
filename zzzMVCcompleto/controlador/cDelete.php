<?php
    if (!empty($_GET['formulario']) ) {
        $errores = array();
        if (empty($_GET['login']) ) {
            $error = "No ha rellenado el campo login.";
            array_push($errores, $error);
        }
        if (empty($_GET['clave']) ) {
            $error = "No ha rellenado el campo clave.";
            array_push($errores, $error);
        }
        if (!empty($errores)) {
            require_once("../vista/vDelete.php");
            require_once("../vista/vErrores.php");
        }else {
            require_once("../modelo/conectaBD.php");
            $login    = $_GET['login'];
            $conexion = ConectaBD::singleton();
            if (!$resultado = $conexion->comprobarUsuario($login)) {
                require_once("../vista/vDelete.php");
                $error = "Error: no existe el login indicado.";
                array_push($errores, $error);
                require_once("../vista/vErrores.php");
            }else {
                $login     = $_GET['login'];
                $clave     = $_GET['clave'];
                $resultado = $conexion->deleteP($login, $clave);
                require_once("../vista/vDelete.php");
                require_once("../vista/vResultado.php");
            }
        }
    }else {
        header("Location:../index.php");
    }

?>