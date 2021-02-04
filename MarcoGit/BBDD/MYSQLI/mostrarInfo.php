<?php 
    // para qeu me muestre los errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_COOKIE['name']) && isset($_COOKIE['id'])){
        echo "Error: No se ha logeado correctamente.";
        header("connLOGIN.php");
    }
    
    $nombreUsuario  = $_COOKIE['name'];
    $id             = $_COOKIE['id'];
    $conexion       = new mysqli("localhost", "host", "12345", "dwes");
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }
  
    $consulta = $conexion->prepare("select * from personas where nombre = ?");
    $consulta->bind_param("s", $nombreUsuario);
    $consulta->execute();
    $resultado = $consulta->get_result();

    if (!$consulta->execute()) {
        echo $conexion->errno;
        echo $conexion->error;
    }

    if ($resultado->num_rows == 0) {
        echo "Ha introducido usuario o contraseña mal";
    }else {
        $arrayResultado = $resultado->fetch_all(); // que era el fech? devuelve la tabla de resultados?
        echo "ID: ";
        print_r($arrayResultado[0][0]);
        echo "<br>Nombre: ";
        print_r($arrayResultado[0][1]);
        echo "<br>Apellido: ";
        print_r($arrayResultado[0][2]);
        echo "<br>Pais: ";
        print_r($arrayResultado[0][3]);
    }


    

    
        
        
    
    

?>
