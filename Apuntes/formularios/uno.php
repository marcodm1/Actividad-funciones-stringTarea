<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="ejercicio1 uno">
	</head>
	<body>
        <form action="dos.php" method="post">
            <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                <input type="text" name="nombre" id="txtNombre" ><br><br>

            <label for="gg"><strong>Escriba su contraseña:</strong></label>
                <input type="password" name="contrasenia" id="gg" ><br><br>

            <label for="check"><strong>Aceptar politica de privacidad:</strong></label>
                <input type="checkbox" name="check"><br><br>

            <label for="sexo"><strong>Seleccione su sexo:</strong></label>
            <label for="hombre">Hombre</label>
                <input type="radio" name="sexo" value="hombre">
            <label for="mujer">Mujer</label>
                    <input type="radio" name="sexo" value="mujer">

            <label for="asignatura"><strong>Seleccione su primera asignatura:</strong></label>
                <select name="asignatura[]" id="asignatura">
                    <option value="DWES">DWES</option>
                    <option value="DWEC">DWEC</option>
                    <option value="DI">DI</option>
                </select><br>

            <input type="submit" value="enviar">
        </form>
    </body>
</html>

