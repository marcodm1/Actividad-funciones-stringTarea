<?php
    if (!isset( $_SESSION['permiso'] )){
        die(); 
    }

    if (!isset( $_SESSION['token']) ) {
        die(); 
    }

    if (!$_SESSION['token'] == $_POST['token']) { 
        die();
    }
    // envia el dinero
    
    unset ($_SESSION['token'] ); // borra lo que tiene guardado para la clave token
    session_start();
    session_destroy();
    header("Location:inicio.php");

?>