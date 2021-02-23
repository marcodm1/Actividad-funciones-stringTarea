<?php  
    if (!isset($_POST['id']) && !isset($_POST['password'])){
        header("Location:conexion.php");
    }else {
        $id        = $_POST['id'];
        $password  = $_POST['password'];
        require_once("conectaBD.php");
        $consulta  = ConectaBD::singleton();
        $resultado = $consulta->comprobarUsuario($id, $password);
        if (!$resultado) {
            echo "Ha introducido mal algun dato";
            header("Location:primera.php");
        }
        setcookie("id", $_POST['id'], time() +3600); // puede
        header("Location:menu.php");
    }

?>