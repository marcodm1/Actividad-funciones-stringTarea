<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro para el BlcakJack</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Black Jack">
        <link rel="stylesheet" href="index.css">
	</head>
	<body>
        <?php
            if (!empty($_POST['regis'])){

                if ($_POST['regis'] == 'conectarse') { //regis devuelve of/off no true o false ni conectarse ni registrarse
                    conectarse();
                }else {
                    registrarse();
                }
                 
            }else {
                ?>
                    <div class="registro"> 
                    <h2><img class="imaggen" src="baraja/ases.png"></h2>
                        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                        
                        <label for="regis">Seleccione si esta o no registrado:</label>

                        <label for="txtConectarse">conectarse</label>
                            <input type="radio" name="regis" id="txtConectarse">
                        <label for="txtRegistrarse">registrarse</label>
                            <input type="radio" name="regis" id="txtRegistrarse">

                        <input type="submit" value="conectarse/registrarse">
                    </div>
                <?php
            }
                

            function registrarse() {
                ?>
                    <div class="registro">
                        <h2>Registrarse al BlackJack <img class="imaggen" src="baraja/ases.png"></h2>
                        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label for="txtNombre">Escribe tu nombre:</label>
                            <input type="text" name="name" id="txtNombre">

                        <label for="txtApellido">Escriba su apellido</label>
                            <input type="text" name="apellido" id="txtApellido">
                        <label for="intEdad">Edad</label>
                            <input type="number" name="edad" id="intEdad">
                        <label for="intCant">Cantidad de dinero a su cuenta para jugar?</label>
                            <input type="number" name="banco" id="intCant">
                        <label for="intPass">Contraseña</label>
                            <input type="number" name="password" id="intPass">
                        <input type="submit" value="jugar">
                    </div>
                <?php
            }

            function conectarse() {
                ?>
                    <div class="registro">
                        <h2>Conectarse al BlackJack <img class="imaggen" src="baraja/ases.png"></h2>
                        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label for="txtNombre">Escribe tu nombre:</label>
                            <input type="text" name="name" id="txtNombre">
                        <label for="intPass">Contraseña</label>
                            <input type="text" name="password" id="intPass">
                        <input type="submit" value="jugar">
                    </div>
                <?php
            }
        ?>
    </body>
</html>




