<?PHP
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }

    if ( !isset($_POST['name']) && !isset($_POST['nameNuevo']) && !isset($_POST['nameNuevoRep']) ) {
        require_once("../vista/VupdateUsuario.php");
    }else {
        require_once("./modelo/conectaBD.php");
        $consulta       = ConectaBD::singleton();
        $name           = $_POST['name'];
        $nameNuevo      = $_POST['nameNuevo'];
        $nameNuevoRep   = $_POST['nameNuevoRep'];
        $id             = $_COOKIE['id'];
        if ($nameNuevo != $nameNuevoRep){
            formularioUsuario();
        }
        $consulta->updateUsuario($name, $nameNuevo, $id);
        require_once("./vista/Vmenu.php");
    }