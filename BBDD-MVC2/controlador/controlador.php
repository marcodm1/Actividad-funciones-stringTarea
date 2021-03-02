<?php
    require_once("./modelo/conectaBD.php");
    $consulta = ConectaBD::singleton();
    $consulta->mostrarTodo();
    require_once("./vista/mostrarTabla.php");


    
    $peticion = $_GET['posicion'];
    switch($peticion) {
        case "create": 
            $consulta->createUsuario($name, $apellido, $pais, $password);
            require_once("./vista/Vmenu.php");
        case "read": 
            $consulta->createUsuario($name, $apellido, $pais, $password);
            require_once("./vista/Vmenu.php");
        case "update": 
            $consulta->createUsuario($name, $apellido, $pais, $password);
            require_once("./vista/Vmenu.php");    
        case "delete": 
            $consulta->createUsuario($name, $apellido, $pais, $password);
            require_once("./vista/Vmenu.php");         
    }





?>