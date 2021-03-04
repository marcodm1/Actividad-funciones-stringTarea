<?PHP
    require_once("../modelo/conectaBD.php");
    $consulta = ConectaBD::singleton();
    $menu = $consulta->mostrarTodo();

    if (isset($_GET['hiddenCrear'])) {
        $nombre   = $_GET["name"];
        $apellido = $_GET["apellido"];
        $pais     = $_GET["pais"];
        $password = $_GET["password"];
        $respuesta = $consulta->createUsuario($nombre, $apellido, $pais, $password);
        if ($respuesta == false) {
            echo "error";
        }else {
            header("Location:./controlador.php");
        }
    }

    if (isset($_GET['hiddenActualizar'])) {
        $name         = $_GET['name'];
        $nameNuevo    = $_GET['nameNuevo'];
        $respuesta = $consulta->updateUsuario($name, $nameNuevo);
        if ($respuesta == false) {
            echo "error";
        }else {
            header("Location:./controlador.php");
        }
    }

    if (isset($_GET['hiddenEliminar'])) {
        $id        = $_GET['id'];
        $respuesta = $consulta->deleteUsuario($id);
        if ($respuesta == false) {
            echo "error";
        }else {
            header("Location:./controlador.php");
        }
    }





?>