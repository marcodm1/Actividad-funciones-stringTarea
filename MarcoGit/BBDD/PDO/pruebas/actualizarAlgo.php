<<<<<<< HEAD
<!-- <php
    $conexion = new mysqli("localhost", "root", "", "dwes");
    $id       = '10';
    $nombre   = 'Liz';
    $consulta = $conexion->prepare("UPDATE personas set id = ? where nombre = ?");
    $consulta->bind_param("ss", $id, $nombre); 
    $consulta->execute();
=======
<?php
    // script para actualizar el id de una persona
    // $conexion = new mysqli("localhost", "root", "", "dwes");
    // $id       = '10';
    // $nombre   = 'Liz';
    // $consulta = $conexion->prepare("UPDATE personas set id = ? where nombre = ?");
    // $consulta->bind_param("ss", $id, $nombre); 
    // $consulta->execute();
    

    // script para actualizar el nombre de una columna
    // $conexion = new mysqli("localhost", "root", "", "dwes");
    // $consulta = $conexion->prepare("ALTER TABLE personas CHANGE contraseña contrasenia VARCHAR(200)");
    // $consulta->execute();



    // script para actualizar la contraseña de una persona
    // $conexion = new mysqli("localhost", "root", "", "dwes");
    // $nombre   = 'Liz';
    // $password = password_hash('123', PASSWORD_DEFAULT); // $password = el hasheado de $_POST['password'], con el estilo PASSWORD_DEFAULT 
    // $consulta = $conexion->prepare("UPDATE personas set contraseña = ? where nombre = ?");
    // $consulta->bind_param("ss", $password, $nombre); 
    // $consulta->execute();
>>>>>>> dfe3d2dc0efb4d87d227f06322f671097e20fbb1
    
    
    // script para actualizar la contraseña de una persona
    $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    
    $nombre     = "hh";
    $apellido   = "hh";
    $pais       = "hh";
    $pass       = password_hash(123, PASSWORD_DEFAULT);

    $consulta = $conexion->prepare("insert into personas (nombre, apellido, pais, contrasenia)  values (:nombre, :apellido, :pais, :contrasenia)");
    $consulta->bindParam(":nombre"     , $nombre);
    $consulta->bindParam(":apellido"   , $apellido);
    $consulta->bindParam(":pais"       , $pais);
    $consulta->bindParam(":contrasenia", $pass);
    $consulta->execute();
    $conexion->errorInfo();

?> -->