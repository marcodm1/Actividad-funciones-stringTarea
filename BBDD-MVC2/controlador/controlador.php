<?php
    require_once("../modelo/conectaBD.php");
    $consulta = ConectaBD::singleton();
    $menu = $consulta->mostrarTodo();
    echo "<pre>";
    print_r($menu);
    echo "</pre>";
    require_once("../vista/Vmenu.php");
    
    if (isset($_GET['menu'])){
        $menu = $_GET['menu'];
        switch($menu) {
            case "crear": 
                require_once("../vista/VcreateUsuario.php");
                break;
            case "actualizar":
                require_once("../vista/VupdateUsuario.php");
                break;
            case "eliminar": 
                require_once("../vista/VdeleteUsuario.php");
                break;
        }
    }





?>