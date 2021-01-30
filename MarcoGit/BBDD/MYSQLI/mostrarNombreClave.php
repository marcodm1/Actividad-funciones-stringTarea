<?php 
    // para qeu me muestre los errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
        echo "Error: No se ha logeado correctamente.";
        header("connLOGIN.php");
    }
    
    $nombreUsuario  = $_COOKIE['usuario'];
    $password       = $_COOKIE['password'];
    $conexion       = new mysqli("localhost", "alumno", "1234", "dwes");
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }

    $consulta = $conexion->prepare("select * from usuarios where login = ? and clave = ?");
    $consulta->bind_param("ss",$nombreUsuario, $password);
    $consulta->execute();
    
    if (!$consulta->execute()) {
        echo $conexion->errno;
        echo $conexion->error;
    }

    $resultado = $consulta->get_result();

    if ($resultado->num_rows == 0) {
        echo "Ha introducido usuario o contraseña mal";
    }else {
        $arrayResultado = $resultado->fetch_all();
        echo "Usuario: ";
        print_r($arrayResultado[0][0]);
        echo "<br>Clave: ";
        print_r($arrayResultado[0][1]);
    }


    

    
        
        
    
    

?>
