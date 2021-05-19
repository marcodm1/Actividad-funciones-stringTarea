<?php

    if (!empty($_GET['formulario'])) {
        $errores = array();
        if (empty($_GET['clave'])) {
            $error = "Error: no ha rellenado el campo clave<br>";
            array_push($errores, $error);
        }
        if (empty($_GET['login'])) {
            $error = "Error: no ha rellenado el campo login<br>";
            array_push($errores, $error);
        }
        if (!empty($errores)) {
            foreach ($errores as $error) {
                echo $error;
            }
            formularioAlta();
        }else {
            require_once("./vista/vistaProductos.php");
            require_once("./modelo/conectaBD.php");
            $login = $_GET['login'];
            $clave = $_GET['clave'];
            $conexion  = ConectaBD::singleton();
            $resultado = $conexion->createP($login, $clave);
            echo $resultado;
            ejecutarTodo();
        }
    }else {
        ejecutarTodo();
    } 


    function ejecutarTodo() {
        require_once("./vista/vistaProductos.php");
        require_once("./modelo/conectaBD.php");
        $conexion  = ConectaBD::singleton();
        $resultado = $conexion->readP();
        mostrarResultados($resultado);
        formularioAlta();
    }
?>