<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="MVC1">
	</head>
	<body>
        <table>
            <?php
            foreach($resultado as $valor) {
                ?><tr>
                <?php
                foreach($valor as $x) {
                    echo'<td>'.$x.'</td>';
                }
                ?></tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>