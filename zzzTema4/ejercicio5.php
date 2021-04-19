<?php
    if (!empty($_GET['nombre']) && !empty($_GET['direccion']) && !empty($_GET['telefono']) && 
            !empty($_GET['altura']) && !empty($_GET['peso']) && !empty($_GET['oficio']) && !empty($_GET['edad'])) {
                $array = $_GET;
                mostrarInfo($array);
                echo comprobarApellido($array);
                mostrarAlReves($array);
                crearOtraMatriz($array);
                
                $array = crearArrayNotas($array);  // - Crear un array asociativo con las notas de un alumno.
                mostrarArray($array);     // - mostrar el contenido del array, separado por comas.
                mostrarNotaAlta($array);  // - mostrar la nota más alta.
                mostrarNotaBaja($array);  // - mostrar la nota más baja.
                mostrarDwes($array);      // - comprobar si tiene la nota de dwes, y mostrarla por pantalla.
    }else {
        formulario();
    }

    function formulario() {
        ?>
        <form action="ejercicio5.php" method="get">
            
            <label for="txtnombre">Escriba un nombre:</label>
                <input type="text" name="nombre" id="txtnombre"><br><br>

            <label for="txtdirecc">Escriba una direccion:</label>
                <input type="text" name="direccion" id="txtdirecc"><br><br>

            <label for="numTlf">Escriba un teléfono:</label>
                <input type="number" name="telefono" id="numTlf"><br><br>

            <label for="numAlt">Escriba una altura:</label>
                <input type="number" name="altura" id="numAlt"><br><br>

            <label for="numPeso">Escriba un peso:</label>
                <input type="number" name="peso" id="numPeso"><br><br>

            <label for="txtOfi">Escriba un oficio:</label>
                <input type="text" name="oficio" id="txtOfi"><br><br>

            <label for="numEdad">Algo de chequear:</label>
                <input type="checkbox" name="edad" id="numEdad"><br><br>

            <input type="submit" value="enviar">
        </form>
        <?php
    }

    function mostrarInfo($array) {
        //- Mostrar la información del empleado.
        foreach ($array as $dato) {
            echo $dato . "<br>";
        }
    }
    function comprobarApellido($array) {
        //- Comprobar si tiene apellidos.
        $tiene = false;
        foreach ($array as $dato) {
            if ($dato == "apellido") {
                return "Tiene apellido: " . $dato;
            }
        }
        return "No tiene apellido";
    }
    function mostrarAlReves($array) {
        //- cambiar el orden de las claves, para que estén al revés.
        $array2 = array();
        foreach ($array as $dato) {
            array_push($array2, $dato);
        }
        echo "<br>";
        krsort($array2);
        foreach ($array2 as $dato) {
            echo($dato) . "<br>";
        }

    }
    function crearOtraMatriz($array) {
        //- crear otra matriz con los datos de oficio y departamento, y utilizar la función array_replace.
        $array = ["oficio" => "Carpintero", "departamento"=> "montaje"];
        $arrayAñadido = array_replace($_GET, $array);
        echo "<pre>";
        var_dump($arrayAñadido);
        echo "</pre>";
    }

    function crearArrayNotas($array) {
        $array = ["php" => 8, "js"=> 9, "html" => 7, "ingles" => 7];
        return $array;
    }
    function mostrarArray($array) {
        foreach ($array as $dato => $valor) {
            echo "<br>Nota de " . $dato .  ": ";
            echo $valor;
        }
    }
    function mostrarNotaAlta($array) {
        $alta = 0;
        foreach ($array as $dato) {
            if ($dato > $alta) {
                $alta = $dato;
            }
        }
        echo "<br>La nota mas alta es: " . $alta;
    }
    function mostrarNotaBaja($array) {
        $baja = 10;
        foreach ($array as $dato) {
            if ($dato < $baja) {
                $baja = $dato;
            }
        }
        echo "<br>La nota mas baja es: " . $baja;
    }
    function mostrarDwes($array) {
        $encontrado = false;
        foreach ($array as $asignatura) {
            if ($asignatura == "dwes") {
                $encontrado = true;
                echo "Ha encontrado la asignatura";
            }
        }
        if ($encontrado == false) {
            echo "<br>No ha encontrado la asignatura";
        }
    }
?>