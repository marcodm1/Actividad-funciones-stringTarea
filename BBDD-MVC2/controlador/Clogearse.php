<?PHP
    if (isset($_POST['id']) && isset($_POST['id'])) {
        $id        = $_POST['id'];
        $password  = $_POST['password'];
        require_once("./modelo/conectaBD.php");
        $consulta  = ConectaBD::singleton();
        $resultado = $consulta->comprobarUsuario($id, $password);
        if (!$resultado) {
            formularioLogearse();
        }
        setcookie("id", $_POST['id'], time() +3600);
        require_once("./vista/Vmenu.php");
    }else {
        require_once("./vista/Vlogearse.php");
    }
?>