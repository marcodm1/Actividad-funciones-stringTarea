<?PHP
    $id        = $_POST['id'];
    $password  = $_POST['password'];
    require_once("/modelo/conectaBD.php");
    $consulta  = ConectaBD::singleton();
    $resultado = $consulta->comprobarUsuario($id, $password);
    if (!$resultado) {
        echo "Ha introducido mal algun dato";
        mostrarFormulario();
    }
    setcookie("id", $_POST['id'], time() +3600);
    require_once("vista/menu.php");

?>