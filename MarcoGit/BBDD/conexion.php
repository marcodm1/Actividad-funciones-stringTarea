<?php


//PASO 1. Conectarnos.
$con = new mysqli('localhost', 'root', '1234', 'dwes');

//PASO 2. Comprobar la conexión
if ($con->connect_errno !=0){
	exit("Ha fallado la conexión ". $con->connect_error);
}
//PASO 3. Realizar la consulta
$consulta= $con->query("select * from usuarios");
echo "Realiza la consulta <br>";


//PASO 4. Procesar la consulta: Obtener resultados
echo "número de filas: " .$con->affected_rows;
echo '<br> <pre>';
if ($consulta) {
        //while($obj = $consulta->fetch_assoc()){
        while($obj = $consulta->fetch_row()){
            print_r($obj);
        }
    }
echo '</pre>';

//PASO 5. Cerrar la conexión
$con->close();
?>

