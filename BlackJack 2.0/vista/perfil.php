<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
</head>
    <body> 
        <?php
           
            if (isset($_POST['ingresar']) ){
                $cantidad = $_POST['ingresar'];
                actualizar($cantidad);
            }else if (isset($_POST['retirar'])) {
                $cantidad = $_POST['retirar'] * (-1);
                actualizar($cantidad);
            }

            function actualizar($cantidad) {
                $id        = $_POST['id'];
                require_once("conectaBD.php");
                $consulta  = ConectaBD::singleton();
                $resultado = $consulta->actualizarBanco($id, $cantidad);
                header("Location:perfil.php");
            }
            function verBanco() {
                $id        = $_COOKIE['id'];
                require_once("conectaBD.php");
                $consulta  = ConectaBD::singleton();
                $resultado = $consulta->consultarSaldo($id);
                header("Location:perfil.php");
            }
        ?>

        <div class="registro">
            <h2>Bienvenido a su perfil ¿Qué desea hacer?<img class="imaggen" src="baraja/ases.png"></h2><br><br>
            <strong><p> Tiene un total en el banco de: <?php verBanco();?> </p><strong>
            <!-- poner cantidad de partidas jugadas? no creo -->

            <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="ing">Ingresar</label>
                    <input type="number" name="ingresar" value="ing">
                <input type="submit"  value="ingresar"><br><br>

            <form class="formulario" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                <label for="ing">Retirar</label>
                    <input type="number" name="retirar" value="ing">
                <input type="submit"  value="retirar"><br><br>
            
            <form class="formulario" action="juego.php" method="POST">
                <input type="submit"  value="Jugar">
        <div> 
    </body>
</html>