<?php
    $conexionBBDD      = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');

    $sentencia = $conexionBBDD->prepare("SELECT * from personas"); // prepare devuelve un objeto tipo sentencia
    $sentencia->execute();
    // $nombres = $sentencia->fetchColumn(1); // devuelve el primer registro del dato de la columna elegida, en este caso 1, devolveria el nombre

    $filasAfectadas = $sentencia->rowCount();     // es como el exec, devuelve numero de filas afectadas
    // el metodo fetchall(); es un metodo de conexionBBDD que devuelve un array de registros 
    // y en el parametro de fetchall() se especifica la manera de retornarlo 
    $personas = $sentencia->fetchAll(PDO::FETCH_CLASS);

    echo "Cantidad de filas: " . $filasAfectadas . "<br>";
    // echo "fetchColum de nombres devuelve el primero: <br>";
    // echo "$nombres"; 
    echo "<br>";
    var_dump($personas);

    echo "Devuelve el nombre de la posicion 0 del array de objetos <br><br>";
    echo $personas[0]->nombre;
?>
