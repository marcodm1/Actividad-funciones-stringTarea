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
        // required                 - <input required           > es obligatorio antes de enviar el formulario
        // minlength y maxlength    - <input minlength="10"     > el texto con minimo o con maximo de x caracteres
        // min y max                - <input min=10 max=12      > los numeros admitidos estan entre el 10 hasta el 12  
        // pattern                  - <input pattern="[0-9]{3}" > expresión regular con la que debe coincidir el valor del control de formulario.
        // <label>Introduce el telefono (34)666-666-666
        // <input name="tel1" type="tel" pattern="[0-9]{3}"placeholder="###" aria-label="3-digit area code" size="2"/>)-
        // <input name="tel2" type="tel" pattern="[0-9]{3}" placeholder="###" aria-label="3-digit prefix" size="2"/> -
        // <input name="tel3" type="tel" pattern="[0-9]{4}" placeholder="####" aria-label="4-digit number" size="3"/>
        // <input name="tel3" type="tel" pattern="[0-9]{4}" placeholder="####" aria-label="4-digit number" size="3"/>
        // </label>
        ?>
        <form action="ejercicio2.php" method="post">
            
            <label for="txtnombre">Nombre del nuevo restaurante?:</label> <!--donde pongo el required? -->
                <input type="text"     name="nombre"    id="txtnombre" value="<?php echo comprobar("nombre", "text"); ?>"><br><br> <!-- no me funciona minlength -->

            <label for="numEdad">Es mayor de 18 años?:</label>
                <input type="checkbox" name="edadmas"   id="numEdad" <?php echo comprobar("edadmas", "checkbox"); ?>><br><br>

            <label for="checkList">Seleccione lo que quiere en la mesa:</label><br> <!--donde pongo el required? -->
                <input type="checkbox" name="checkList[]" value="cuchara"    <?php echo comprobar("checkList", "checkbox", "cuchara");    ?>id="checkList">   <label>cuchara     </label><br/>
                <input type="checkbox" name="checkList[]" value="tenedor"    <?php echo comprobar("checkList", "checkbox", "tenedor");    ?>> <label>tenedor     </label><br/>
                <input type="checkbox" name="checkList[]" value="cuchillo"   <?php echo comprobar("checkList", "checkbox", "cuchillo");   ?>> <label>cuchillo    </label><br/>
                <input type="checkbox" name="checkList[]" value="plato"      <?php echo comprobar("checkList", "checkbox", "plato");      ?>> <label>plato       </label><br/>
                <input type="checkbox" name="checkList[]" value="vaso"       <?php echo comprobar("checkList", "checkbox", "vaso");       ?>> <label>vaso        </label><br/>
                <input type="checkbox" name="checkList[]" value="copa"       <?php echo comprobar("checkList", "checkbox", "copa");       ?>> <label>copa        </label><br/>
                <input type="checkbox" name="checkList[]" value="servilleta" <?php echo comprobar("checkList", "checkbox", "servilleta"); ?>> <label>servilleta  </label><br/>
          
            <label for="plato">Seleccione su plato principal:</label><br> <!--donde pongo el required? -->
                    <input type="radio" name="plato" value="macarrones" <?php echo comprobar("plato", "radio", "macarrones") ?>>
                <label for="macarrones">Macarrones con chorizo</label><br>
                    <input type="radio" name="plato" value="carbonara"  <?php echo comprobar("plato", "radio", "carbonara") ?>>
                <label for="carbonara"> Pasta carbonara </label><br>
                    <input type="radio" name="plato" value="pizza"      <?php echo comprobar("plato", "radio", "pizza") ?>>
                <label for="pizza">     Pizza           </label><br>
                    <input type="radio" name="plato" value="burguer"    <?php echo comprobar("plato", "radio", "burguer") ?>>
                <label for="burguer">   Burguer         </label><br><br>

            <label for="horario">Seleccione su horario:</label>
                <select id="horario" name="horario[]" required>
                    <option value="seleccione">Seleccione</option>
                    <option value="comidas" <?php echo comprobar("horario", "option", "comidas"); ?>>Comidas</option>
                    <option value="cenas"   <?php echo comprobar("horario", "option", "cenas");   ?>>Cenas</option>
                </select><br>
            <input type="submit" value="enviar"><br><br>
                <label >Introduce el telefono (66)666-666-666 <!--dentro del label que tengo que ponerle ? for="algo" y en cada input un name con "algo" ?? -->
                   (<input name="tel1" type="tel" pattern="[0-9]{2}" placeholder="66"  size="1"/>)-
                    <input name="tel2" type="tel" pattern="[0-9]{3}" placeholder="666" size="2"/> -
                    <input name="tel3" type="tel" pattern="[0-9]{3}" placeholder="666" size="2"/> -
                    <input name="tel3" type="tel" pattern="[0-9]{3}" placeholder="666" size="2"/>
                </label>
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