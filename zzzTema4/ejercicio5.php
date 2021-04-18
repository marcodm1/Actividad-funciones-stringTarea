<?php
    if (!empty($_GET['nombre']) && !empty($_GET['direccion']) && !empty($_GET['telefono']) && 
            !empty($_GET['altura']) && !empty($_GET['peso']) && !empty($_GET['oficio']) && !empty($_GET['edad'])) {
                mostrarInfo();
                echo comprobarApellido();
                mostrarAlReves();
                crearOtraMatriz();
                
                crearArrayNotas();  // - Crear un array asociativo con las notas de un alumno.
                mostrarArray();     // - mostrar el contenido del array, separado por comas.
                mostrarNotaAlta();  // - mostrar la nota más alta.
                mostrarNotaBaja();  // - mostrar la nota más baja.
                mostrarDwes();      // - comprobar si tiene la nota de dwes, y mostrarla por pantalla.
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

    function mostrarInfo() {
        //- Mostrar la información del empleado.
        foreach ($_GET as $dato) {
            echo $dato . "<br>";
        }
    }
    function comprobarApellido() {
        //- Comprobar si tiene apellidos.
        $tiene = false;
        foreach ($_GET as $dato) {
            if ($dato == "apellido") {
                return "Tiene apellido: " . $dato;
            }
        }
        return "No tiene apellido";
    }
    function mostrarAlReves() {
        //- cambiar el orden de las claves, para que estén al revés.

    }
    function crearOtraMatriz() {
        //- crear otra matriz con los datos de oficio y departamento, y utilizar la función array_replace.
        
    }


    function crearArrayNotas() {

    }
    function mostrarArray() {
        
    }
    function mostrarNotaAlta() {
        
    }
    function mostrarNotaBaja() {
        
    }
    function mostrarDwes() {
        
    }

   

?>