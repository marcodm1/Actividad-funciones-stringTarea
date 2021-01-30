<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_POST['name']) && isset($_POST['password']) ){
        header("Location:formLOGIN.php");
    }
    
    $nombreUsuario  = $_POST['name'];
    $password       = $_POST['password'];
    $conexion       = new mysqli("localhost", "alumno", "1234", "dwes");
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }else {
        setcookie("usuario",  $nombreUsuario, time() +3600);
        setcookie("password", $password ,     time() +3600);
        header("Location:menu.php");
    }

   ?> 

    
    