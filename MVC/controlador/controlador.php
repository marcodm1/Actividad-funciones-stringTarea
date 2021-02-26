<?PHP
        require_once("./modelo/conectaBD.php");
        $consulta  = ConectaBD::singleton();
        $res = $consulta->readUsuario();
        require_once("./vista/cierre.php");
?>