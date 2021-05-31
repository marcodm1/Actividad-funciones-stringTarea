<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="captcha">
        <link rel="stylesheet" href="captcha.css">
	</head>
	<body>
    <div class="principal">
        <div class="captcha1">
            <img src="captcha.php">
        </div>
        <div class="formulario1">
            <?php  
                session_start();

                if (isset($_POST['campo']) && isset($_SESSION['texto'])) {
                    if ($_POST['campo'] === $_SESSION['texto']) {
                        echo "Correcto";
                        ?>
                        <form action="principal.php" method="post">
                        <input type="submit" value="volver">
                        <?php
                    }else {
                        echo "Incorrecto";
                        ?>
                        <form action="principal.php" method="post">
                        <input type="submit" value="volver">
                        <?php
                    }
                }else {
                    mostrarFormulario();
                }
                 
            ?> 
        </div>
    </div>
    
    <?php    
        function mostrarFormulario(){
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="intNombre">Escriba el captcha:</label>
                    <input type="text" name="campo" id="intNombre">
                <input type="submit" value="Enviar">
            </form>
            <form action="principal.php" method="post">
                <input type="submit" value="cargar otro captcha">
            </form>
            <?php
        }
    ?>



</body>
</html>

