<?php
    if (!empty($_POST['nombre']) && !empty($_POST['edadmas']) && !empty($_POST['edadmenos']) && !empty($_POST['checklist']) && !empty($_POST['plato']) && !empty($_POST['horario'])) {
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
        if ((empty($_POST['edadmas']) && empty($_POST['edadmenos'])) || (!empty($_POST['edadmas']) && !empty($_POST['edadmenos'])) ) {
            $error2 = 'No ha seleccionado campo: "Es mayor o menor de 18 años": debe seleccionar almenos 1.';
            array_push($error, $error2);
        }
        if (!isset($_POST['checkList'])) {
            echo "dadada";
            $error3 = 'No ha rellenado el campo: "Seleccione lo que queire en la mesa"';
            array_push($error, $error3);
        }else {
            // foreach ($_POST as $clave) {
            //     if (!empty($clave) ){

            //     }
            // }
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
        
        echo "<pre>";
        print_r($error);
        echo "</pre";
    }

    function formulario() {
        ?>
        <form action="ejercicio2.php" method="post">
            
            <label for="txtnombre">Nombre del nuevo restaurante?:</label>
                <input type="text"     name="nombre"    id="txtnombre" value="<?php echo comprobar("nombre", "text"); ?>"><br><br> <!-- no me funciona minlength -->

            <label for="numEdad">Es mayor de 18 años?:</label>
                <input type="checkbox" name="edadmas"   id="numEdad" <?php echo comprobar("edadmas", "checkbox"); ?>><br><br>

            <label for="numEdad">Es menor de 18 años?:</label>
                <input type="checkbox" name="edadmenos" id="numEdad" <?php echo comprobar("edadmenos", "checkbox"); ?>><br><br>

            <label for="checkList">Seleccione lo que quiere en la mesa:</label><br> <!-- no se si hay que poner o no esta linea -->
                <input type="checkbox" name="checkList[]" value="cuchara"    <?php echo comprobar("checkList", "checkbox", "cuchara");    ?>id="checkList">   <label>cuchara     </label><br/>
                <input type="checkbox" name="checkList[]" value="tenedor"    <?php echo comprobar("checkList", "checkbox", "tenedor");    ?>> <label>tenedor     </label><br/>
                <input type="checkbox" name="checkList[]" value="cuchillo"   <?php echo comprobar("checkList", "checkbox", "cuchillo");    ?>> <label>cuchillo    </label><br/>
                <input type="checkbox" name="checkList[]" value="plato"      <?php echo comprobar("checkList", "checkbox", "plato");      ?>> <label>plato       </label><br/>
                <input type="checkbox" name="checkList[]" value="vaso"       <?php echo comprobar("checkList", "checkbox", "vaso");       ?>> <label>vaso        </label><br/>
                <input type="checkbox" name="checkList[]" value="copa"       <?php echo comprobar("checkList", "checkbox", "copa");       ?>> <label>copa        </label><br/>
                <input type="checkbox" name="checkList[]" value="servilleta" <?php echo comprobar("checkList", "checkbox", "servilleta"); ?>> <label>servilleta  </label><br/>
          
            <label for="plato">Seleccione su plato principal:</label><br>
                    <input type="radio" name="plato" value="macarrones" <?php echo comprobar("plato", "radio", "macarrones") ?>>
                <label for="macarrones">Macarrones con chorizo</label><br>
                    <input type="radio" name="plato" value="carbonara"  <?php echo comprobar("plato", "radio", "carbonara") ?>>
                <label for="carbonara"> Pasta carbonara </label><br>
                    <input type="radio" name="plato" value="pizza"      <?php echo comprobar("plato", "radio", "pizza") ?>>
                <label for="pizza">     Pizza           </label><br>
                    <input type="radio" name="plato" value="burguer"    <?php echo comprobar("plato", "radio", "burguer") ?>>
                <label for="burguer">   Burguer         </label><br><br>

            <label for="horario">Seleccione su horario:</label>
                <select id="horario" name="horario[]">
                    <option value="seleccione">Seleccione</option>
                    <option value="comidas" <?php echo comprobar("horario", "option", "comidas"); ?>>Comidas</option>
                    <option value="cenas"   <?php echo comprobar("horario", "option", "cenas"); ?>  >Cenas</option>
                </select><br>
            <input type="submit" value="enviar">
        </form>
        <?php
        echo "<pre>";
        print_r($_POST);
        echo "</pre";
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