<?php


//PASO 1. Conectarnos.
$con = new mysqli('localhost', 'root','', 'dwes');  // sqli nos permite conectarnos con una BBDD

//PASO 2. Comprobar la conexión
if ($con->connect_errno !=0){
	exit("Ha fallado la conexión ". $con->connect_error);
}
if (!$con->set_charset ("utf8")) { // esto hay que ponelo siempre
    exit ("Ha fallado, al stablecer el charset");
} 

//PASO 3. Realizar la consulta
$usuario = $con->real_escape_string ("Ramón");
$clave = $con->real_escape_string ('Nohay2"sin3');
$sentencia = "insert into usuarios values('$usuario', '$clave')";
echo $sentencia;
$insert = $con->query($sentencia);
echo "Realiza el insert <br>";

if (!$insert) {
    exit ("ha fallado el...");
}


//PASO 4. Cerrar la conexión
$con->close();
?>

