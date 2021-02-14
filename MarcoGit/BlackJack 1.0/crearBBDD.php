<?php
    // script para crear una bbdd
    $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');
    $consulta = $conexion->prepare("CREATE TABLE 'blackjack' ('id' int(20));");
    $consulta->execute();
    

    
?>

// en el cmd
drop table BlackJack;

create table BlackJack (
    id int(20) not null primary key auto_increment,
    nombre varchar(20) not null,
    apellido varchar(20) not null,
    edad int(20) not null,
    contrasenia int(200) not null
    );

