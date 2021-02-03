<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_POST['name']) && isset($_POST['id']) ){
        header("Location:formLOGIN.php");
    }
    
    $nombreUsuario  = $_POST['name'];
    $id             = $_POST['id'];
    
    $conexion = new mysqli("localhost", "root", "", "dwes");
    $nombreUsuario  = $conexion->real_escape_string($nombreUsuario); // codifica los parametros de la consulta
    $id             = $conexion->real_escape_string($id);
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }else {
        $consulta = $conexion->prepare("select * from personas where id = ? and nombre = ?");// prepare para evitar sql injection
        

        $consulta->bind_param("is", $id, $dfdfd);
        $consulta->execute();
        

        $resultado = $consulta->get_result();

        if ($resultado->num_rows == 0) {
            header("Location:formLOGIN.php");
        }else {
            setcookie("usuario", $nombreUsuario, time() +3600);
            setcookie("id",      $id ,           time() +3600);
            header("Location:menu.php");
        }
    }

?> 

    
    