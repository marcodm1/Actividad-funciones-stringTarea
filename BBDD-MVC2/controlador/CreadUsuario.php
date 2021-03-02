<?PHP
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }

    if ( !isset($_POST['name']) || !isset($_POST['pagina']) ) {
        require_once("../vista/VreadUsuario.php");
    }else {
        $name      = $_POST['name'];
        $numPagina = $_POST['pagina'];
        require_once("../modelo/conectaBD.php");
        $consulta  = ConectaBD::singleton();
        $resultado = $consulta->readUsuario($name, $numPagina);
        
        require_once("../vista/Vmenu.php");
    }

?>

