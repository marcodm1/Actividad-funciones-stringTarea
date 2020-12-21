<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Black Jack">
	</head>
	<body>
        <?php
            if (empty($_POST['nombre'])){
                formulario();
            }else {
                session_start();
                $_SESSION['nombre'] = $_POST['nombre'];
                header("Location:back.php");
            }
        
            function formulario() {
                ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                    <label for="txtNombre">Escriba su nombre:</label>
                        <input type="text" name="nombre" id="txtNombre"><br><br>

                    <input type="submit" value="jugar">
                <?php
            }
        
        ?>
    </body>
</html>




