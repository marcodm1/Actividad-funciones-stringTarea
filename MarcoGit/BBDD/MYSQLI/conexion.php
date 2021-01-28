<?php 
    // para qeu me muestre los errores
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (!isset($_POST['name']) && isset($_POST['newPassword']) && isset($_POST['repeatPassword'])){
        header("Location:julian.php");
    }
    
    $nombreUsuario  = $_POST['name'];
    $password       = $_POST['password'];
    $conexion       = new mysqli("localhost", "alumno", "1234", "dwes");
    
    if ($conexion->connect_errno) {
        echo "Ha habido un error";
    }

    // query es como sentecia
    //$consulta = $conexion->query("select * from usuarios where usuarios = " . $nombreUsuario);
    // prepare es como "preprando" y usamos las ? para que sea mas seguro
    // y prepare puede retornar falso y chequeamos si prepare ha devuelto un false
    if ($consulta = $conexion->prepare("select * from usuarios where login = ? and clave = ?")) {
       // bind_param es el metodo que sustituye de las ? y se pone u caractes eje "s" por cada ?
        $consulta->bind_param("ss",$nombreUsuario, $password);
        $consulta->execute();
        // devuelve un objeto que contiene array de strings
        $resultado = $consulta->get_result();
        // con este if comprobamos si ha introducido usuario y contraseña correctos
        if ($resultado->num_rows == 0) {
            echo "Ha introducido usuario o contraseña mal";
        }else {
            $arrayResultado = $resultado->fetch_all();// fetch_all es como traer todos los resultados
            echo "Usuario: ";
            print_r($arrayResultado[0][0]);
            echo "<br>Contraseña: ";
            print_r($arrayResultado[0][1]);
        }
        
    }else {
        echo $conexion->errno;
        echo $conexion->error;
    }
    

?>
