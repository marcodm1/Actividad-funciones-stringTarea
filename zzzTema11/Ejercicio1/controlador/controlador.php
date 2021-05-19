<?php 
    require_once("./modelo/conectaBD.php");
    $conexion = ConectaBD::singleton();
    $resultado = $conexion->readP("todos");
    
    require_once("./vista/vistaProductos.php");   


    



?>