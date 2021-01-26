<?php

// un video que explica todo esto
// https://www.youtube.com/watch?v=Wu38PToAhdM&feature=emb_logo


//1 Ejecutar sentencias basicas sin ontraseña
    // (1) conexion a la BBDD que guardamos en la variable $pdo
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (2) Definir la sentencia SQL
    $comando = $pdo->query("select * from usuarios");

    // (3) Ejecutar la sentencia SQL
    $comando->execute();

    // (4) Recuperar información
    $resultado = $comando->fetchAll();

    // Imprimir en pantalla
    var_dump($resultado);

//2 Ejecutar sentencias basicas pero con parametros

    //Cambiar el nombre de la base de datos, usuario y clave
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (1) Definir SQL
    $comando = $pdo->prepare("select * from usuarios where estado = :estado");

    // (2) Asignar valores a los parametros. pero:
        // el método bindParam asociamos esta variable 
        // con el parámetro de la sentencia SQL.
    $estado = 'Activo';
    $comando->bindParam(':estado', $estado);

    // (3) Ejecutar SQL
    $comando->execute();

    // (4) Recuperar información como en el ejemplo uno pero se guarda en un
        // array asociativo
    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);

    // Imprimir en pantalla
    var_dump($resultado);


//3 Agregar informacion en la BBDD

    //Cambiar el nombre de la base de datos, usuario y clave
    $pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

    // (1) Definir SQL
    $comando = $pdo->prepare("insert into usuarios (nombre, email, estado) values(:nombre, :email, :estado)");

    // (2) Asignar valores a los parametros
    $estado = 'Activo';
    $email  = 'dwes@gmail.com';
    $nombre = 'Gaby Cruz';
    $comando->bindParam(':estado', $estado);
    $comando->bindParam(':email', $email);
    $comando->bindParam(':nombre', $nombre);

    // (3) Ejecutar SQL
    $comando->execute();



//4 Eliminar informacion en la BBDD

//Cambiar el nombre de la base de datos, usuario y clave
$pdo = new PDO('mysql:host=localhost;dbname=dwes', 'root', '1234');

// (1) Definir SQL
$comando = $pdo->prepare("delete from usuarios where id = :id");

// (2) Asignar valores a los parametros
$id = 1;
$comando->bindParam(':id', $id);

// (3) Ejecutar SQL
$comando->execute();



// https://diego.com.es/tutorial-de-pdo 
// una segunda pagina una vez se comprenda esto, ya que es mas jodida.


?>