<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
        <link rel="stylesheet" href="../estilo.css">
	</head>
	<body>
        <div>
            <table>
                <tr><td colspan="2">Usuarios:</td></tr>
                <?php
                foreach ($resultado as $fila => $contenido) {
                    ?>
                    <tr>
                    <?php foreach ($contenido as $columna) {
                            ?> <td> <?php echo $columna; ?> </td>
                            <?php
                            }
                    ?>
                    </td></tr>
                    <?php
                }
            ?>
            </table>
        </div> 

        <form action="../index.php" method="get">
                <input type="submit" value="←">
            </form>
</body>
</html> 