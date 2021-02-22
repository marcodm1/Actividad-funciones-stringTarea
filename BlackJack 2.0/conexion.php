<?php  
    session_start();
?>

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

            if (isset($_POST['primerFormu']) ){
                if ($_POST['primerFormu'] == "conectarse"){
                    header("Location:gdfgdgf.php");

                }else {
                    registrarse();
                }
            }else {
                echo "0";
                ?>
                    <div class="registro"> 
                    <h2>Bienvenido al BlackJack ¿Qué desea hacer?<img class="imaggen" src="baraja/ases.png"></h2><br><br>

                        <form class="conectarseRegistrarse" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label for="conectarse">conectarse</label>
                            <input type="radio" name="primerFormu" value="conectarse">
                        <label for="registrarse">registrarse</label>
                            <input type="radio" name="primerFormu" value="registrarse"><br><br>

                        <input type="submit"  value="Aceptar">
                    </div>
                <?php
            }
                

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

            function conectarse() {
                ?>
                    <div class="registro">
                        <h2>BlackJack <img class="imaggen" src="baraja/ases.png"></h2>
                        
                        <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                        <label for="intId">Id:</label>
                            <input type="text" name="id" id="intId"><br>
                        <label for="intPass">Contraseña</label>
                            <input type="password" name="password" id="intPass"><br>
                        <input type="submit" value="Jugar">
                    </div>
                <?php
            }

            function comprobar() {
                $id        = $_POST['id'];
                $password  = $_POST['password'];
                require_once("conectaBD.php");
                $consulta  = ConectaBD::singleton();
                $resultado = $consulta->comprobarUsuario($id, $password);
                if (!$resultado) {
                    echo "No coincide el nombre con la contraseña, intentelo de nuevo.";
                    // conectarse();
                }
                setcookie("id", $_POST['id'], time() +3600);
                header("Location:perfil.php");
            }


        ?>
    </body>
</html>