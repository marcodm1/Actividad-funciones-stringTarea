(funciones de arrays)

Crear un php donde crees un array asociativo con un conjunto de valores de una entidad, por ejemplo un empleado. 



- Mostrar la información del empleado.

- Comprobar si tiene apellidos.

- cambiar el orden de las claves, para que estén al revés.

- crear otra matriz con los datos de oficio y departamento, y utilizar la función array_replace.





Crear un array asociativo con las notas de un alumno.

- mostrar el contenido del array, separado por comas.

- mostrar la nota más alta.

- mostrar la nota más baja.

- comprobar si tiene la nota de dwes, y mostrarla por pantalla.

<?php
    if (!empty($_GET['numero'])) {
       
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

            <label for="numEdad">Escriba una edad:</label>
                <input type="checkbox" name="edad" id="numEdad"><br><br>

            <input type="submit" value="enviar">
        </form>
        <?php
    }

   

?>