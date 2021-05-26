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
            // hacer un vista para los erroreS?
            foreach ($errores as $error) {
                echo $error . "<br>"; // al ser controlador, no tendria que tener ningun echo
            }
            require_once("../vista/vUpdate.php");
        }else {
            require_once("../modelo/conectaBD.php");
            $login1    = $_GET['login1'];
            $conexion  = ConectaBD::singleton();
            if (!$resultado = $conexion->comprobarUsuario($login1)) {
                require_once("../vista/vUpdate.php");
                echo "Error: no existe el login indicado."; // al ser controlador, no tendria que tener ningun echo
            }else {
                $login2    = $_GET['login2'];
                $clave     = $_GET['clave'];
                $resultado = $conexion->updateP($login1, $login2, $clave);
                require_once("../vista/vUpdate.php");
                echo $resultado;
            }
        }
    }else {
        header("Location:../index.php");
    }

?>
            