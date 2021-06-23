
<?php
    if (!empty($_POST['formulario'])) {
        $errores  = array();
        if (empty($_POST['clave'])) {
            $error1 = 'No ha rellenado el campo: "Clave"';
            array_push($errores, $error1);
            require_once("./vRegistrarse.php");
            require_once("./vErrores.php");
        }else {
            require_once("./conectaBD.php");
            require_once("./cFiltrado.php");
            $clave    = filtrado($_POST['clave']);
            $conexion = ConectaBD::singleton();
            if (!$resultado = $conexion->comprobarClave($clave)) {
                require_once("./vRegistrarse.php");
                $error = "No ha sido posible conectarse con la bbdd";
                array_push($errores, $error);
                require_once("./vErrores.php");
            }else {
                if ($resultado) {
                    require_once("./conectaBD.php");
                    $conexion = ConectaBD::singleton();
                    if (!$resultadosPacientes = $conexion->mostrarPacientes()) {
                        $error = "No ha sido posible ver los pacientes";
                        require_once("./vOperaciones.php");
                        array_push($errores, $error);
                        require_once("./vErrores.php");
                    }else {
                        if (!$resultadosSalas = $conexion->mostrarSalas()) {
                            $error = "No ha sido posible ver las salas";
                            require_once("./vOperaciones.php");
                            array_push($errores, $error);
                            require_once("./vErrores.php");
                        }else {
                            require_once("./vOperaciones.php");
                        }
                    }
                }else {
                    $error1 = 'Contraseña incorrecta';
                    array_push($errores, $error1);
                    require_once("./vRegistrarse.php");
                    require_once("./vErrores.php");
                }
            }
        }
    }else {
        $error  = array();
        $error1 = 'No ha enviado el formulario';
        array_push($error, $error1);
        require_once("./vRegistrarse.php");
        require_once("./vErrores.php");
    }
?>
