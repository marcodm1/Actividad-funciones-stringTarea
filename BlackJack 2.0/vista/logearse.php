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
    <?PHP
        conectarse();
        function conectarse() {
            ?>
                <div class="registro">
                    <h2>BlackJack <img class="imaggen" src="../baraja/ases.png"></h2>
                    
                    <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                    <label for="intId">Id:</label>
                        <input type="text" name="id" id="intId"><br>
                    <label for="intPass">Contraseña</label>
                        <input type="password" name="password" id="intPass"><br>
                    <input type="submit" value="Jugar">
                </div>
            <?php
        }
    ?>
    </body>
</html>
