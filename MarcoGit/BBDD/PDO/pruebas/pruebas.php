<?php
    $conexionBBDD = new PDO('mysql:host=localhost;dbname=dwes', 'root', '');

    $sentencia = $conexionBBDD->prepare("SELECT * from personas"); // prepare devuelve un objeto tipo sentencia
    $sentencia->execute();
    // $nombres = $sentencia->fetchColumn(1); // devuele el primer registro de la consulta, y en el parametro el numero de columna

    // $filasAfectadas = $sentencia->rowCount(); 
    $personas = $sentencia->fetchAll(PDO::FETCH_OBJ); // FETCH_BOTH, FETCH_CLASS, FETCH_ASSOC, FETCH_OBJ

    // echo "Cantidad de filas: " . $filasAfectadas . "<br>";
    // echo "<br>";
    // echo $personas[1]->nombre; //esto es para el fetchColum(1);
    
    foreach ($personas as $clave => $valor) {
        echo "<br> Usuario:<br>";
        foreach ($valor as $key => $value) {
            echo $value . "<br>";
        }
        
    }
    
    // echo "<br><br>Devuelve el nombre de la posicion 0 del array de objetos .nombre <br>";
?>
