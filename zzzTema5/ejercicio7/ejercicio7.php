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
            if (empty($_POST['idioma'])){
                $error = "<br>Error: No ha rellenado el campo1.<br>";
                array_push($errores, $error);
            } 
            if (!empty($errores)) {
                foreach ($errores as $error) {
                    echo $error;
                }
                formulario();
            }else {
                session_start();
                $_SESSION['idioma']  = $_POST['idioma'];
                $_SESSION['idiomas'] = implode(",", $_SESSION['idioma']);
                header("Location:procesa_sesiones.php");
            }
        }else {
            formulario();
        }

        function formulario() {
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                
                <label for="idioma">Seleccione su iodioma: </label>
                    <select multiple="multiple" id="idioma" name="idioma[]" required>
                        <option value="">       Seleccione</option>
                        <option value="Ingles"> Inglés    </option>
                        <option value="Aleman"> Alemán    </option>
                        <option value="Español">Español   </option>
                        <option value="Turco">  Turco     </option>
                    </select><br>

                <input type="submit" name ="formulario" value="enviar"><br><br>
            </form>

            <?php
        }
    ?>
</body>
</html>
