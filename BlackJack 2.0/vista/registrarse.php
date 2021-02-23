<?php

function registrarse() { 
    ?>
        <div class="registro">
            <h2>Registrarse al BlackJack <img class="imaggen" src="baraja/ases.png"></h2>

            <form class="formulario" action="comprobarUsuario.php" method="POST">

            <label for="txtNombre">Escribe tu nombre:</label>
                <input type="text" name="name" id="txtNombre"><br>
            <label for="txtApellido">Escriba su apellido</label>
                <input type="text" name="apellido" id="txtApellido"><br>
            <label for="intEdad">Edad</label>
                <input type="number" name="edad" id="intEdad"><br>
            <label for="intCant">Cantidad de dinero a su cuenta para jugar?</label>
                <input type="number" name="banco" id="intCant"><br>
            <label for="intPass">Contraseña</label>
                <input type="number" name="password" id="intPass"><br>
            <input type="submit" value="jugar">
        </div>
    <?php
}





?>