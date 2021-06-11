
<?php
    if (!empty($_POST['formulario'])) {
        $errores  = array();
        if (empty($_POST['codigo'])) {
            $error1 = 'No ha rellenado el campo: "codigo"';
            array_push($errores, $error1);
        }else {
            require_once("./conectaBD.php");
            $conexion = ConectaBD::singleton();
            if (!$resultadosCodigos = $conexion->mostrarCodigos()) {
                $error = "No ha sido posible acceder a los codigos";
                require_once("./vOperaciones.php");
                array_push($errores, $error);
                require_once("./vErrores.php");
            }else {
                if (array_search($_POST['codigo'], $resultadosCodigos) == 0) {
                    $error1 = 'No ha introducido correctamente el codigo del colegiado ';
                    array_push($errores, $error1);
                }else {
                    if (!$resultadosActivos = $conexion->colegiadosActivos()) {
                        $error1 = 'El colegiado no esta en activo';
                        array_push($errores, $error1);
                    }
                }
            }
        }
        if (empty($_POST['nombre'])) {
            $error1 = 'No ha rellenado el campo: "nombre"';
            array_push($errores, $error1);
        }
        if (empty($_POST['fecha'])) {
            $error1 = 'No ha rellenado el campo: "fecha"';
            array_push($errores, $error1);
        }
        if (empty($_POST['sala'])) {
            $error1 = 'No ha rellenado el campo: "sala"';
            array_push($errores, $error1);
        }
        if (empty($_POST['turno'])) {
            $error1 = 'No ha rellenado el campo: "turno"';
            array_push($errores, $error1);
        }
        if (!empty($errores)) {
            require_once("./vOperaciones.php");
            require_once("./vErrores.php");
        }


        // si no hay errores, dar de alta y msotrarlo
        require_once("./conectaBD.php");
        $conexion = ConectaBD::singleton();
        if (!$resultadoDNI = $conexion->mostrar1Paciente($_POST['nombre'])) {
            foreach ($resultadoDNI as $dni) {
                $dni_paciente = $resultado;
            }
        }
        $codigo_colegiado   = $_POST['codigo'];
        $fecha_operacion    = $_POST['fecha'];
        $codigo_sala        = $_POST['sala'];
        $turno              = $_POST['turno'];
        if (!$resultado = $conexion->darAlta($codigo_colegiado, $dni_paciente, $fecha_operacion, $codigo_sala, $turno)) {
            echo "No ha sido posible dar de alta al usuario";
        }else {
            echo "Se ha dado de alta correctamente";
        }
        
    }else {
        $error  = array();
        $error1 = 'No ha enviado el formulario';
        array_push($error, $error1);
        require_once("./vAlta.php");
        require_once("./vErrores.php");
    }
?>
