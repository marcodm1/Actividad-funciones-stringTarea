<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio x">
	</head>
	<body>
        <?php
            $errores = array();
            if (!empty($_POST['formulario'])) {
                if (empty($_POST['nombre'])){
                    $error = "<br>Error: No ha rellenado el nombre.";
                    array_push($errores, $error);
                    if (strlen($_POST['nombre']) < 5) {
                        $error = "<br>Error: Longitud del nombre demasiado corto, min 5 letras";
                        array_push($errores, $error); 
                    }
                } 
                if (empty($_POST['edad'])){
                    $error = "<br>Error: No ha rellenado el edad.<br>";
                    array_push($errores, $error);
                }
                if (empty($_POST['plato'])){
                    $error = "<br>Error: No ha rellenado el plato.<br>";
                    array_push($errores, $error);
                }
                if (!empty($_POST['horario'])) {
                    if ($_POST['horario'][0] == "") {
                        $error = '<br>Error: No ha rellenado el campo horario';
                           array_push($errores, $error);
    
                    }
                }
                if (!empty($errores)) {
                    formulario();
                    foreach ($errores as $error) {
                        echo $error;
                    }
                }else {
                    echo "<ol>";
                    foreach ($_POST as $algo) {
                        if (is_array($algo)) {
                            foreach ($algo as $clave => $valor) {
                                echo "<li>" . $valor . "</li>";
                            }
                        }else {
                            echo "<li>" . $algo . "</li>";
                        }
                    }
                    echo "</ol>";
                }
            }else {
                formulario();
            }
            function formulario() {
                ?>
                <form action="ejercicio2.php" method="post">
                    
                    <label for="txtnombre">Nombre del nuevo restaurante?:</label>
                        <input type="text" name="nombre" id="txtnombre" minlength="5" value="<?php echo comprobar("nombre", "text"); ?>"><br><br> <!-- no me funciona minlength -->

                    <label for="numEdad">Es mayor de 18 años?:</label>
                        <input type="checkbox" name="edad" id="numEdad" <?php echo comprobar("edad", "checkbox"); ?>><br><br>

                    <label>Seleccione su plato principal:</label><br>
                            <input type="radio" name="plato" id="macarrones" value="macarrones" <?php echo comprobar("plato", "radio", "macarrones") ?>>
                        <label for="macarrones">Macarrones con chorizo</label><br>

                            <input type="radio" name="plato" id="carbonara"  value="carbonara"  <?php echo comprobar("plato", "radio", "carbonara") ?>> 
                        <label for="carbonara"> Pasta carbonara </label><br>

                            <input type="radio" name="plato" id="pizza"      value="pizza"      <?php echo comprobar("plato", "radio", "pizza") ?>>
                        <label for="pizza">     Pizza           </label><br>

                            <input type="radio" name="plato" id="burguer" value="burguer"       <?php echo comprobar("plato", "radio", "burguer") ?>>
                        <label for="burguer">   Burguer         </label><br><br>

                    <label for="horario">Seleccione su horario:</label>
                        <select id="horario" name="horario[]">
                            <option value="">-Seleccione-</option>
                            <option value="comidas" <?php echo comprobar("horario", "option", "comidas"); ?>>Comidas</option>
                            <option value="cenas"   <?php echo comprobar("horario", "option", "cenas"); ?>>Cenas</option>
                        </select><br>
                        
                    <input type="submit" value="enviar" name="formulario">
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