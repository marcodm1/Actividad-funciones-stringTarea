<?php
    // crear table
    $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    $consulta = $conexion->prepare("CREATE table gg (
        id int(20) not null primary key auto_increment, 
        nombre varchar(20) not null, 
        apellido varchar(20) not null, 
        edad int(20) not null, 
        banco int(20) not null, 
        contrasenia varchar(200) not null
       );");
    $consulta->execute();
    
    
    // eliminar table 
    // $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    // $consulta = $conexion->prepare("DROP table gg;");
    // $consulta->execute();
?>
