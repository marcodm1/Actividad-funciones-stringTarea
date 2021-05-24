<?php
    require_once("./modelo/conectaBD.php"); // pongo todos estos al principio porque si ?
    require_once("./vista/vistaProductos.php");

    if (!empty($_GET['formLogin']) ) {
        $conexion   = ConectaBD::singleton();
        $login      = $_GET['loginID'];
        $clave      = hash("sha256", $_GET['claveID']);

        
        $resultado  = $conexion->comprobarUsuario($clave);
        if (strcmp($clave, $resultado) === 0) {
            echo "Usuario validado.";
        }else {
            echo "Usuario no validado";
        }
    }else {
        formLogin();        
    }

?>