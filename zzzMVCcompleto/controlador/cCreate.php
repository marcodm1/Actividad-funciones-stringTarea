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
            // hacer un vista para los erroreS?
            foreach ($errores as $error) {
                echo $error . "<br>"; // al ser controlador, no tendria que tener ningun echo
            }
            require_once("../vista/vCreate.php");
        }else {
            require_once("../modelo/conectaBD.php");
            $login = $_GET['login'];
            $conexion  = ConectaBD::singleton();
            if ($resultado = $conexion->comprobarUsuario($login)) {
                require_once("../vista/vCreate.php");
                echo "Error: ya existe el login indicado."; // al ser controlador, no tendria que tener ningun echo
            }else {
                $clave = $_GET['clave'];
                $resultado = $conexion->createP($login, $clave);
                require_once("../vista/vCreate.php");
                echo $resultado;
            }
        }
    }else {
        header("Location:../index.php");
    }

?>