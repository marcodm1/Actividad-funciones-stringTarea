<?php
    if (!isset($_COOKIE['id'])){
        require_once("./controlador/Clogearse.php");
    }
    
    if (!isset($_POST['id']) && !isset($_POST['password'])){
        require_once("../vista/VdeleteUsuario.php");
    }else {
        require_once("./modelo/conectaBD.php");
        $consulta = ConectaBD::singleton();
        $id       = $_POST['id'];
        $password = $_POST['password'];
        require_once("./vista/Vmenu.php");
    }