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
    if (!empty($_POST['nombre']) && !empty($_POST['edadmas']) && !empty($_POST['checkList']) && !empty($_POST['plato']) && !empty($_POST['horario'])) {
        echo "<ol>";
        foreach ($_POST as $algo) {
            if (is_array($algo)) {
                foreach ($algo as $clave => $valor) {
                    echo "<li>" . $valor . "</li>";
                }
            }else {
                echo "<li>" . $algo . "</li><br>";
            }
        }
        echo "</ol>";
    }else {
        $error = array();
        if (empty($_POST['nombre'])) {
            $error1 = 'No ha rellenado el campo: "Nombre"';
            array_push($error, $error1);
        }
        if (empty($_POST['edadmas']) ) {
            $error2 = 'No ha seleccionado campo: "Es mayor o menor de 18 años":';
            array_push($error, $error2);
        }
        if (!isset($_POST['checkList'])) {
            $error3 = 'No ha rellenado el campo: "Seleccione lo que queire en la mesa"';
            array_push($error, $error3);
        }
        if (empty($_POST['plato'])) {
            $error4 = 'No ha rellenado el campo: "Seleccione plato principal"';
            array_push($error, $error4);
        }
        if (empty($_POST['horario'])) {
            $error5 = 'No ha rellenado el campo: "Seleccione su horario"';
            array_push($error, $error5);
 
        }else {
            if (!empty($_POST['horario'])) {
                if ($_POST['horario'][0] == "seleccione") {
                    $error5 = 'No ha rellenado el campo: "Seleccione su horario"';
                       array_push($error, $error5);

                }
            }
        }
        formulario();
        
        if (!empty($error)) {
            echo "<pre>";
            print_r($error);
            echo "</pre";
        }
    }

    function formulario() {
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            
            <label for="txtnombreJ">Nombre del juego:</label>
                <input type="text" name="nombreJuego" id="txtnombreJ" value="<?php echo comprobar("nombreJuego", "text"); ?>"><br><br> <!-- no me funciona minlength -->

            <label for="txtnombreJ1">Nombre Jugador1:</label>
                <input type="text" name="nombreJ1" id="txtnombreJ1" value="<?php echo comprobar("nombreJ1", "text"); ?>"><br><br> <!-- no me funciona minlength -->

            <label for="txtnombreJ2">Nombre Jugador2:</label>
                <input type="text" name="nombreJ2" id="txtnombreJ2" value="<?php echo comprobar("nombreJ2", "text"); ?>"><br><br> <!-- no me funciona minlength -->

            <label for="cantCartas">Cantidad de cartas por palo:</label>
                <select id="cantCartas" name="cantCartas[]" required>
                    <option value="">Seleccione</option>
                    <option value="10"<?php echo comprobar("cantCartas", "option", "comidas"); ?>>10</option>
                    <option value="7" <?php echo comprobar("cantCartas", "option", "cenas");   ?>>7</option>
                </select><br>












            <label for="checkList">Seleccione lo que quiere en la mesa:</label><br>
                <input type="checkbox" name="checkList[]" value="cuchara"    <?php echo comprobar("checkList", "checkbox", "cuchara");    ?>id="checkList">   <label>cuchara     </label><br/>
                <input type="checkbox" name="checkList[]" value="tenedor"    <?php echo comprobar("checkList", "checkbox", "tenedor");    ?>> <label>tenedor     </label><br/>
                <input type="checkbox" name="checkList[]" value="cuchillo"   <?php echo comprobar("checkList", "checkbox", "cuchillo");   ?>> <label>cuchillo    </label><br/>
                <input type="checkbox" name="checkList[]" value="plato"      <?php echo comprobar("checkList", "checkbox", "plato");      ?>> <label>plato       </label><br/>
                <input type="checkbox" name="checkList[]" value="vaso"       <?php echo comprobar("checkList", "checkbox", "vaso");       ?>> <label>vaso        </label><br/>
                <input type="checkbox" name="checkList[]" value="copa"       <?php echo comprobar("checkList", "checkbox", "copa");       ?>> <label>copa        </label><br/>
                <input type="checkbox" name="checkList[]" value="servilleta" <?php echo comprobar("checkList", "checkbox", "servilleta"); ?>> <label>servilleta  </label><br/>
          
            <label for="plato">Seleccione su plato principal:</label><br>
                    <input type="radio" name="plato" value="macarrones" id="macarrones" <?php echo comprobar("plato", "radio", "macarrones") ?>>
                <label for="macarrones">Macarrones con chorizo</label><br>
                    <input type="radio" name="plato" value="carbonara" id="carbonara" <?php echo comprobar("plato", "radio", "carbonara") ?>>
                <label for="carbonara"> Pasta carbonara </label><br>
                    <input type="radio" name="plato" value="pizza"     id="pizza" <?php echo comprobar("plato", "radio", "pizza") ?>>
                <label for="pizza">     Pizza           </label><br>
                    <input type="radio" name="plato" value="burguer"   id="burguer" <?php echo comprobar("plato", "radio", "burguer") ?>>
                <label for="burguer">   Burguer         </label><br><br>

            <label for="horario">Seleccione su horario:</label>
                <select id="horario" name="horario[]" required>
                    <option value="">Seleccione</option>
                    <option value="comidas" <?php echo comprobar("horario", "option", "comidas"); ?>>Comidas</option>
                    <option value="cenas"   <?php echo comprobar("horario", "option", "cenas");   ?>>Cenas</option>
                </select><br>
            <input type="submit" value="enviar"><br><br>
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
            }
        }
        return ""; 
    }
?>

</body>
</html>