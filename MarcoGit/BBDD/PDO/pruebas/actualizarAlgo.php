<?php
    $conexion = new mysqli("localhost", "root", "", "dwes");
    $id       = '10';
    $nombre   = 'Liz';
    $consulta = $conexion->prepare("UPDATE personas set id = ? where nombre = ?");
    $consulta->bind_param("ss", $id, $nombre); 
    $consulta->execute();
    
    $password   = password_hash('123', PASSWORD_DEFAULT); // $password = el hasheado de $_POST['password'], con el estilo PASSWORD_DEFAULT 
    return $password;
    
    


?>