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
        session_start();

        if (empty($_SESSION['idioma'])) {
            echo "<br>Error: No ha seleccionado un idioma de la lista de idiomas.<br>";
        }else {
            foreach ($_SESSION['idioma'] as $idioma) {
                echo "Ha seleccionado: " . $idioma . "<br>";
            }
            echo $_SESSION['idiomas'];
        }
    ?>
</body>
</html>
