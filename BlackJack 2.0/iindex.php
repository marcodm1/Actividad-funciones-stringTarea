<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Registro para el BlcakJack</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Black Jack">
        <link rel="stylesheet" href="./vista/index.css">
	</head>
	<body>
        <?php

            if (isset($_POST['primerFormu']) ){
                if ($_POST['primerFormu'] == "conectarse"){
                    header("Location:./vista/logearse.php");
                }else {
                    header("Location:./vista/registrarse.php");
                }
            }else {
                ?>
                    <div class="registro"> 
                    <h2>Bienvenido al BlackJack ¿Qué desea hacer?<img class="imaggen" src="./baraja/ases.png"></h2><br><br>

                        <form class="conectarseRegistrarse" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label for="conectarse">conectarse</label>
                            <input type="radio" name="primerFormu" value="conectarse">
                        <label for="registrarse">registrarse</label>
                            <input type="radio" name="primerFormu" value="registrarse"><br><br>

                        <input type="submit"  value="Aceptar">
                    </div>
                <?php
            }
        ?>
    </body>
</html>