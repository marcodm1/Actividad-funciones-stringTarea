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
            if (!empty($_POST['formu'])){
                if ($_REQUEST['formu']=="conectarse"){
                    conectarse();
                }else {
                    registrarse();
                }
            }else {
                ?>
                    <div class="registro"> 
                    <h2><img class="imaggen" src="baraja/ases.png"></h2>
                        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label for="formu">Seleccione opcion:</label><br><br>

                        <label for="conectarse">conectarse</label>
                            <input type="radio" name="formu" value="conectarse">
                        <label for="registrarse">registrarse</label>
                            <input type="radio" name="formu" value="registrarse"><br><br>

                        <input type="submit"  value="enviar">
                    </div>
                <?php
            }
                

            function registrarse() {
                ?>
                    <div class="registro">
                        <h2>Registrarse al BlackJack <img class="imaggen" src="baraja/ases.png"></h2>
                        <form class="formulario" action="back.php" method="POST">

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

            function conectarse() {
                ?>
                    <div class="registro">
                        <h2>Conectarse al BlackJack <img class="imaggen" src="baraja/ases.png"></h2>
                        <form class="formulario" action="back.php" method="POST">

                        <label for="txtNombre">Escribe tu nombre:</label>
                            <input type="text" name="name" id="txtNombre"><br>
                        <label for="intPass">Contraseña</label>
                            <input type="text" name="password" id="intPass"><br>
                        <input type="submit" value="jugar">
                    </div>
                <?php
            }
        ?>
    </body>
</html>




