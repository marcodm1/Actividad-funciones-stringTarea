<?PHP
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }
    
    if ( !isset($_POST['name']) && !isset($_POST['apellido']) && !isset($_POST['pais']) && !isset($_POST['password']) ) {
        require_once("../vista/VcreateUsuario.php");
    }else {
        $name       = $_POST['name'];
        $apellido   = $_POST['apellido'];
        $pais       = $_POST['pais'];
        $password   = $_POST['password'];
    
        require_once("./modelo/conectaBD.php");
        $consulta = ConectaBD::singleton();
        $consulta->createUsuario($name, $apellido, $pais, $password);
        require_once("./vista/Vmenu.php");
    }
?>