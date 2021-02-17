<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados.">
	</head>
	<body>
        <form action="nombreDelFichero.php" method="get">
            <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                <input type="text" name="nombre" id="txtNombre" ><br><br>

            <label for="gg"><strong>Escriba su contraseña:</strong></label>
                <input type="password" name="contrasenia" id="gg" ><br><br>

            <label for="sexo"><strong>Seleccione su sexo:</strong></label>
                <label for="hombre">Hombre</label>
                    <input type="radio" name="sexo" value="hombre">

                <label for="mujer">Mujer</label>
                    <input type="radio" name="sexo" value="mujer">

                <label for="otros">Otros</label>
                    <input type="radio" name="sexo" value="otro"><br><br><br>

            <label for="asignatura"><strong>Seleccione su primera asignatura:</strong></label>
                <select name="asignatura[]" id="asignatura">
                    <option value="DWES">DWES</option>
                    <option value="DWEC">DWEC</option>
                    <option value="DI">DI</option>
                </select><br>

            <label for="asignaturas"><strong>Seleccione su segunda asignatura:</strong></label>
                <select name="asignaturas[]" id="asignaturas" multiple>
                    <option value="DWES">DWES</option>
                    <option value="DWEC">DWEC</option>
                    <option value="DI">DI</option>
                </select><br><br>

            <label for="check"><strong>Aceptar politica de privacidad:</strong></label>
                <input type="checkbox" name="check"><br><br>

            <label for="fecha"><strong>Seleccione su edad:</strong></label>
                <input type="date" name="fecha" value="2018-07-22"><br><br>

            <label for="number"><strong>Seleccione su numero favorito:</strong></label>
                <input type="number" name="number" id="textNumber">
            <br><br>
            <input type="submit" value="enviar">
        </form>
    </body>
</html>

//este codigo tal cual, es el que se tiene que poner en un fichero nuevo, y arriba cambiar en nombreDelFichero
<?php
// para comprobar si ha enviado algo... if(isset($_GET['numero'])){
    echo "Nombre: " . $_GET['nombre'];
    echo "<br>";
    echo "Contraseña: " . $_GET['contrasenia'];
    echo "<br>"; 
    echo "Sexo: " . $_GET['sexo'];
    echo "<br>";
    
    echo "Asignatura 1: ";
    foreach ($_GET['asignatura'] as $asignatura) {
        echo $asignatura;
    }
    echo "<br>";

    echo "Asignatura 2: ";
    foreach ($_GET['asignaturas'] as $asignatura) {
        echo $asignatura;
    }
    echo "<br>";

    echo "Check: " . $_GET['check'];
    echo "<br>";

    echo "Fecha: " . $_GET['fecha'];
    echo "<br>";

    echo "Numero favorito: " . $_GET['number'];
    echo "<br>";
?>