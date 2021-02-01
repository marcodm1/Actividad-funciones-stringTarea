<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_POST['password']) && isset($_POST['newPassword']) && isset($_POST['repeatPassword']) ) {
        echo "Error: No se ha logeado correctamente.";
        header("formCambioPWD.php");
    }
   
    $nombreUsuario  = $_COOKIE['usuario'];
    $password       = $_POST['password'];
    $newPassword    = $_POST['newPassword'];
    $repPassword    = $_POST['repeatPassword'];
    $conexion       = new mysqli("localhost", "host", "12345", "dwes");
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }

    $consulta = $conexion->prepare("update usuarios set clave=? where login=? and clave=?");
    $consulta->bind_param("sss", $newPassword , $nombreUsuario, $password );
    $consulta->execute();

    if (!$consulta->execute()) {
        echo $conexion->errno;
        echo $conexion->error;
    }
       
    header("formLOGIN.php");

?>
