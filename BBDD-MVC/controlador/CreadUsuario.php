<?PHP
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }

    if ( !isset($_POST['name']) || !isset($_POST['pagina']) ) {
        require_once("../vista/Vlogearse.php");
    }else {
        $name      = $_POST['name'];
        $numPagina = $_POST['pagina'];
        require_once("./modelo/conectaBD.php");
        $consulta  = ConectaBD::singleton();
        $resultado = $consulta->readUsuario($name, $numPagina);
        var_dump($resultado);
        require_once("./vista/Vmenu.php");
    }

?>

