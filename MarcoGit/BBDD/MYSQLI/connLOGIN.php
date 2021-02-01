<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_POST['name']) && isset($_POST['id']) ){
        header("Location:formLOGIN.php");
    }
    
    $nombreUsuario  = $_POST['name'];
    $id             = $_POST['id'];
    $conexion       = new mysqli("localhost", "root", "", "dwes");
    // me faltan ls real_scape_strings o el cuote para PDO para hacerla mas segura
    // xss
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }else {
        $consulta = $conexion->prepare("select * from personas where id = ? and nombre = ?");// para evitar sql injection
        $consulta->bind_param("is", $id, $nombreUsuario);
        $consulta->execute();
        

        $resultado = $consulta->get_result();

        if ($resultado->num_rows == 0) {
            header("Location:formLOGIN.php");
        }else {
            setcookie("usuario", $nombreUsuario, time() +3600);
            setcookie("id",      $id ,           time() +3600);
            // como averiguo el parametro que me interese usado a la BBDD
            // y despues:
            // hacer un if para comprobar si ha entrado como host o como usuario a dwes
            // ha entrado como admin, crear cookie de admin, si no, entrar en menu directo
            header("Location:menu.php");
        }
    }

?> 

    
    