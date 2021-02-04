
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="ejercicio2 unodos">
</head>
<body>
    <?php 
        if (isset($_POST['password']) && isset($_POST['newPassword']) && isset($_POST['repeatPassword']) ){
            echo "Error: contraseña y repetir contraseña no coinciden.";
        }

        mostrarFormulario();
        function mostrarFormulario(){
            ?>
            <h1> Para cambiar la contraseña del usuario</h1>
                <form action="connCambioPWD.php" method="post">
                    <label for="pwd">Contraseña actual:</label>
                        <input type="password" name="password" id="pwd"><br><br>
                    <label for="pwd1">Nueva contraseña:</label>
                        <input type="password" name="newPassword" id="pwd1"><br><br>
                    <label for="pwd2">Repetir nueva contraseña:</label>
                        <input type="password" name="repeatPassword" id="pwd2"><br><br>
                    
                    <input type="submit" value="enviar">
                </form>
            <?php
        }
    ?>
    

</body>
</html>


<!-- 
<php


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
$usuario   = $con->real_escape_string ("Ramón");
$clave     = $con->real_escape_string ('Nohay2"sin3');
$sentencia = "insert into usuarios values('$usuario', '$clave')";
echo $sentencia;
$insert    = $con->query($sentencia);
echo "Realiza el insert <br>";

if (!$insert) {
    exit ("ha fallado el...");
}


//PASO 4. Cerrar la conexión
$con->close();
?>



 -->