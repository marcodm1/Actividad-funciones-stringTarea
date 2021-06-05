<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="captcha">
    <link rel="stylesheet"   href="captcha.css">
</head>
<body>
<div class="principal">
    <div class="formulario1">
        <?php  
            session_start();

            if (!empty($_POST['name']) && !empty($_POST['pass']) && !empty($_POST['captcha'])) {
                if ($_POST['captcha'] == $_SESSION['texto']) {
                    if ($_POST['name'] == $_POST['pass']) {
                        echo "Nombre y contraseña coinciden";
                        ?>
                        <form action="./index.php" method="post">
                            <input type="submit" value="volver">
                        <?php
                    }else {
                        echo "Nombre y contraseña no coinciden";
                        ?>
                        <form action="./index.php" method="post">
                            <input type="submit" value="volver">
                        <?php
                    }

                }else {
                    echo " Captcha incorrecto";
                    ?>
                    <form action="./index.php" method="post">
                        <input type="submit" value="volver">
                    <?php
                }
            }else {
                ?>
                <div class="captcha1">
                    <img src="captcha.php">
                </div>
                <?php
                mostrarFormulario();
            }  
        ?> 
    </div>
</div>

<?php    
    function mostrarFormulario(){
        ?>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <label for="txtn">Usuario:</label>
                <input type="text" name="name" id="txtn" size="6"><br>

            <label for="intp">Contraseña:</label>
                <input type="password" name="pass" id="intp" size="6"><br>

            <label for="intNombre">Captcha:</label>
                <input type="text" name="captcha" id="intNombre" size="4"><br>
            <input type="submit" value="Enviar">
        </form>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <input type="submit" value="cargar otro captcha">
        </form>
        <?php
    }
?>

</body>
</html>

