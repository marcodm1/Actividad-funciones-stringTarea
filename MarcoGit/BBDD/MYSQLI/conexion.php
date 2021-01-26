<?php 
    // para qeu me muestre los errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_POST['name']) && isset($_POST['password'])){
        header("Location:julian.php");
    }
    $nombreUsuario  = $_POST['name'];
    $password       = $_POST['password'];

    $conexion = new mysqli("localhost", "root", "", "dwes");
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }

    // query es como sentecia
    //$sentencia = $conexion->query("select * from usuarios where usuarios = " . $nombreUsuario);
    // prepare es como "preprando" y usamos las ? para que sea mas seguro
    // y prepare puede retornar falso y chequeamos si prepare ha devuelto un false
    if ($sentencia = $conexion->prepare("select * from usuarios where login = ? and clave = ?")) {
       // bind_param es el metodo que sustituye de las ? y se pone u caractes eje "s" por cada ?
        $sentencia->bind_param("ss",$nombreUsuario, $password);
        $sentencia->execute();
        // devuelve un objeto que contiene array de strings
        $a = $sentencia->get_result();
        print_r($a);
    }else {
        echo $conexion->errno;
        echo $conexion->error;
    }
    

?>
