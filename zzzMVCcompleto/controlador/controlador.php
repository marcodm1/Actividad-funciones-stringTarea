<?php
// function filtrado($datos){
//     $datos = trim($datos); // Elimina espacios antes y después de los datos
//     $datos = stripslashes($datos); // Elimina backslashes \
//     $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
//     return $datos;
// }


    require_once("./modelo/conectaBD.php"); // pongo todos estos al principio porque si ?
    require_once("./vista/vistaProductos.php");

    if (!empty($_GET['formOption']) ) {
        switch ($_GET['formOption']) {
            case "añadir":
                echo "<br>Indique los datos del usuario que va a añadir:<br><br>";// al ser controlador, no se si puede mostrar un echo
                mostrarUsuarios();
                formCreate();
                break;
            case "modificar":
                echo "<br>Indique los datos del usuario que va a modificar:<br><br>";// al ser controlador, no se si puede mostrar un echo
                mostrarUsuarios();
                formupdate();
                break;
            case "eliminar":
                echo "<br>Indique los datos del usuario que va a eliminar:<br><br>";// al ser controlador, no se si puede mostrar un echo
                mostrarUsuarios();
                formDelete();
                break;
            default:
                echo "No ha seleccionado nada"; // al ser controlador, no se si puede mostrar un echo
        }
    }else {
        if (empty($_GET['formCreate']) && empty($_GET['formUpdate']) && empty($_GET['formDelete']) ) {
            mostrarUsuarios();
            formOption(); 
        }else {
            $conexion  = ConectaBD::singleton();

            if (!empty($_GET['formCreate'])) {
                $formu = $_GET['formCreate'];
            }
            if (!empty($_GET['formUpdate'])) {
                $formu = $_GET['formUpdate'];
            }
            if (!empty($_GET['formDelete'])) {
                $formu = $_GET['formDelete'];
            }
            
            switch ($formu) {
                case "create":
                    // $login = trim($_GET['loginCr']);
                    $login = $_GET['loginCr'];
                    if ($resultado = $conexion->comprobarUsuario($login)) {
                        echo "Error: ya existe el login indicado.";
                        mostrarUsuarios();
                        formOption();
                        break;
                    }
                    $clave = $_GET['claveCr'];
                    $resultado = $conexion->createP($login, $clave);
                    echo $resultado . " el usuario " . $login;
                    mostrarUsuarios();
                    formOption();
                    break;
                case "update":
                    $loginOld = $_GET['loginUpO'];
                    if (!$resultado = $conexion->comprobarUsuario($loginOld)) {
                        echo "Error: no existe el login indicado.";
                        mostrarUsuarios();
                        formOption();
                        break;
                    }
                   
                    $loginNew  = $_GET['loginUpN'];
                    $claveNew  = $_GET['claveUpN'];
                    $resultado = $conexion->updateP($loginOld, $loginNew, $claveNew);
                    echo $resultado . " el usuario " . $loginOld . " pasa a ser: " . $loginNew;
                    
                    mostrarUsuarios();
                    formOption();
                    break;
                case "delete":
                    $login = $_GET['loginDel'];
                    if (!$resultado = $conexion->comprobarUsuario($login)) {
                        echo "Error: no existe el login indicado.";
                        mostrarUsuarios();
                        formOption();
                        break;
                    }
                    $clave = $_GET['claveDel'];
                    $resultado = $conexion->deleteP($login);
                    echo $resultado . " el usuario " . $login;
                    mostrarUsuarios();
                    formOption();
                    break;
                default:
                    echo "No ha seleccionado nada";
            }
        }
    }

    function  mostrarUsuarios() { // al final hacer todas las comprobaciones
        $conexion  = ConectaBD::singleton();
        $resultado = $conexion->readP();
        formRead($resultado);
    }
?>