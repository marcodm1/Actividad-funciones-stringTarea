<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio x">
	</head>
	<body>
        <?php
            if (!empty($_POST['nombre']) && !empty($_POST['edad']) && !empty($_POST['plato']) && !empty($_POST['horario'])) {
                echo "<ol>";
                foreach ($_POST as $algo) {
                    if (is_array($algo)) {
                        foreach ($algo as $clave => $valor) {
                            echo "<li>" . $valor . "</li>";
                        }
                    }else {
                        echo "<li>" . $algo . "</li>";
                    }
                }
                echo "</ol>";
            }else {
                formulario();
            }

            function formulario() {
                ?>
                <form action="ejercicio2.php" method="post">
                    
                    <label for="txtnombre">Nombre del nuevo restaurante?:</label>
                        <input type="text" name="nombre" id="txtnombre" minlength="5" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br> <!-- no me funciona minlength -->

                    <label for="numEdad">Es mayor de 18 años?:</label>
                        <input type="checkbox" name="edad" id="numEdad" ><br><br>

                    <label>Seleccione su plato principal:</label><br>
                        <label for="macarrones">Macarrones con chorizo</label><br>
                            <input type="radio" name="plato" id="macarrones" value="macarrones">

                        <label for="carbonara"> Pasta carbonara </label><br>
                            <input type="radio" name="plato" id="carbonara" value="carbonara">

                        <label for="pizza">     Pizza           </label><br>
                            <input type="radio" name="plato" id="pizza" value="pizza">

                        <label for="burguer">   Burguer         </label><br><br>
                            <input type="radio" name="plato" id="burguer" value="burguer">

                    <label for="horario">Seleccione su horario:</label>
                        <select id="horario" name="horario[]">
                            <option value="comidas">Comidas</option>
                            <option value="cenas">Cenas</option>
                        </select><br>
                    <input type="submit" value="enviar">
                </form>
                <?php
            }

        ?>
	</body>
</html>