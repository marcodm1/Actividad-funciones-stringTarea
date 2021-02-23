<?php
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
    // $id       = 1;
    // $password = password_hash('123', PASSWORD_DEFAULT);
    // $consulta = $conexion->prepare("UPDATE blackjack set contrasenia = ? where id = ?"); // no me funciona el hasheado
    // $consulta->bind_param("ss", $password, $id); 
    // $consulta->execute();

    
    
    // script para crear un nuevo usuario con contraseña hasheada e id autoincrementado
    $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    
    $nombre     = "Ruben";
    $apellido   = "Lopez";
    $edad       = "28";
    $banco      = 100;
    $pass       = password_hash('123', PASSWORD_DEFAULT);
    $consulta = $conexion->prepare("insert into blackjack (nombre, apellido, edad, banco, contrasenia)  values (:nombre, :apellido, :edad, :banco, :contrasenia)");
    $consulta->bindParam(":nombre"     , $nombre);
    $consulta->bindParam(":apellido"   , $apellido);
    $consulta->bindParam(":edad"       , $edad);
    $consulta->bindParam(":banco"      , $banco);
    $consulta->bindParam(":contrasenia", $pass); // debug indica que la pass esta hasheada pero en la BBDD aparece 0
    $consulta->execute();



//     --------------script para eliminar una fila-----------------
    // $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    // $id       = 1;
    // $consulta = $conexion->prepare("DELETE FROM blackjack where id=:id");
    // $consulta->bindParam(":id", $id);
    // $consulta->execute();

// ?> 