<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Tema4. Ej1.">
</head>
<body>
    <?php
    if (!empty($_POST['formulario'])) {
        if (empty($_POST['nombre']) || empty($_POST['edadmas'])) {
            $error = array();
            if (empty($_POST['nombre'])) {
                $error1 = 'No ha rellenado el campo: "Nombre"';
                array_push($error, $error1);
            }
            if (empty($_POST['edadmas']) ) {
                $error2 = 'No ha seleccionado campo: "Es mayor o menor de 18 años":';
                array_push($error, $error2);
            }
            formulario();
            if (!empty($error)) {
                echo "<pre>";
                print_r($error);
                echo "</pre";
            }
        }else {
            // aqui entramos al programa porque no tiene errores
        }
    }else {
        formulario();
    }
    function formulario() {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            
            <label for="txtnombre">Nombre del nuevo restaurante?:</label> 
                <input type="text" name="nombre" id="txtnombre" value="<?php echo comprobar("nombre", "text"); ?>"><br><br> <

            <label for="numEdad">Es mayor de 18 años?:</label>
                <input type="checkbox" name="edadmas" id="numEdad" <?php echo comprobar("edadmas", "checkbox"); ?>><br><br>

            <input type="submit" name="formulario" value="enviar"><br><br>
        </form>
        <?php
    }

    function comprobar($name, $tipo, $value = null) {
        if (!empty($_POST[$name])) {
            switch ($tipo) {
                case "text": return $_POST[$name]; 
                    break;
                case "checkbox": 
                    if (isset($value)) {
                        if (in_array($value, $_POST[$name]) ) {
                            return 'checked="checked"';
                        }
                    }else {
                        return 'checked="checked"';
                    } 
                    break;
                case "radio": 
                    if ($_POST[$name] == $value) {
                        return 'checked="checked"';
                    }
                    break;
                case "option": 
                    if (in_array($value, $_POST[$name]) ) {
                        return 'selected="selected"';
                    }   
                    break;
                case "date": 
                    $dia = date("Y-m-d", strtotime($_POST['fecha']));
                    return "$dia";
                    break;
            }
        }
        return ""; 
    }
?>

</body>
</html>