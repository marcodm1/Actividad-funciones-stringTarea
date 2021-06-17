<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Tema4. Ej1.">
</head>
<body>
    <?php
        $errores = array();

        if (!empty($_POST['formulario'])) {
            if (empty($_POST['codigo'])){
                $error = "<br>Error: No ha rellenado el campo1.<br>";
                array_push($errores, $error);
            } 
            if (empty($_POST['nombre'])){
                $error = "<br>Error: No ha rellenado el campo2.<br>";
                array_push($errores, $error);
            }
            if (!empty($errores)) {
                foreach ($errores as $error) {
                    echo $error;
                }
                formulario();
            }else {
                $codigo = $_POST['codigo'];
                $nombre = $_POST['nombre'];
                setcookie("codigo", $codigo, time() +60, './', 'localhost'); // ./ ó ../ejercicio6
                setcookie("nombre", $nombre, time() +60, './', 'localhost'); // con solo /, la cookie estará disponible en la totalidad del domain
                // setcookie("cookieSegura", "Marco Segura", time() +60, '../ejercicio6', 'localhost', true);
                // setcookie("cookieSegura", "Marco Segura", time() +60, __DIR__ . DIRECTORY_SEPARATOR, 'localhost', true);
    
                header("Location: procesa.php");

            }

        }else {
            formulario();
        }

        function formulario() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                
                <label for="numC">Codigo</label>
                    <input type="number" name="codigo" id="numC"><br><br>
                    
                <label for="txtnombre">Nombre</label>
                    <input type="text"   name="nombre" id="txtnombre"><br><br>

                <input type="submit" name ="formulario" value="enviar"><br><br>
            </form>
            <?php
        }
    ?>
</body>
</html>
