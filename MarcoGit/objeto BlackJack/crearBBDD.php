<?php

   // comprobar si con esta consulta puedo crear a tabla para mi blackJack
    CREATE TABLE IF NOT EXISTS 'blackjack' (
        'id' int(20) NOT NULL AUTO_INCREMENT COMMENT 'id',
        `nombre` varchar(50) NOT NULL COMMENT 'nombre cliente',
        `apellidos` varchar(100) NOT NULL COMMENT 'Apellidos cliente',
        `telefono` int(9) NOT NULL COMMENT 'móvil',
        `codigo_postal` int(5) DEFAULT NULL,
        `edad` int(3) DEFAULT NULL,
        `sexo` char(1) NOT NULL,
        `profesion` text NOT NULL,
        PRIMARY KEY (`nif`),
        UNIQUE KEY `telefono` (`telefono`),
        KEY `nombre` (`nombre`),
        FULLTEXT KEY `apellidos` (`apellidos`)
    )

    // script para cambiar el id de una persona
    // $conexion = new mysqli("localhost", "root", "", "dwes");
    // $id       = '10';
    // $nombre   = 'Liz';
    // $consulta = $conexion->prepare("UPDATE personas set id = ? where nombre = ?");
    // $consulta->bind_param("ss", $id, $nombre); 
    // $consulta->execute();
    

    // script para cambiar el nombre de una columna
    // $conexion = new mysqli("localhost", "root", "", "dwes");
    // $consulta = $conexion->prepare("ALTER TABLE personas CHANGE contraseña contrasenia VARCHAR(200)");
    // $consulta->execute();



    // script para cambiar la contraseña de una persona
    // $conexion = new mysqli("localhost", "root", "", "dwes");
    // $nombre   = 'Liz';
    // $password = password_hash('123', PASSWORD_DEFAULT); // $password = el hasheado de $_POST['password'], con el estilo PASSWORD_DEFAULT 
    // $consulta = $conexion->prepare("UPDATE personas set contraseña = ? where nombre = ?");
    // $consulta->bind_param("ss", $password, $nombre); 
    // $consulta->execute();

    
    
    // script para crear un nuevo usuario con contraseña hasheada e id autoincrementado
    // $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    
    // $nombre     = "hh";
    // $apellido   = "hh";
    // $pais       = "hh";
    // $pass       = password_hash(123, PASSWORD_DEFAULT);

    // $consulta = $conexion->prepare("insert into personas (nombre, apellido, pais, contrasenia)  values (:nombre, :apellido, :pais, :contrasenia)");
    // $consulta->bindParam(":nombre"     , $nombre);
    // $consulta->bindParam(":apellido"   , $apellido);
    // $consulta->bindParam(":pais"       , $pais);
    // $consulta->bindParam(":contrasenia", $pass);
    // $consulta->execute();
    // $conexion->errorInfo();


// script para eliminar una fila
    // $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    // $nombre     = "hh";
    // $consulta = $conexion->prepare("DELETE FROM personas where nombre=:nombre");
    // $consulta->bindParam(":nombre", $nombre);
    // $consulta->execute();
    // $conexion->errorInfo();





?> 