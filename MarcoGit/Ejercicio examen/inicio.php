<!DOCTYPE html>
<html lang="es">
<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio formulario">
	</head>
	<body>
	
        <form action="inicio.php" method="get">
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
                <option value="DWES">Lengua</option>
                <option value="DWEC">Ingles</option>
                <option value="DI">Matematicas</option>
            </select><br><br>

        <label for="check"><strong>Aceptar politica de privacidad:</strong></label>
            <input type="checkbox" name="check"><br><br>

        <label for="fecha"><strong>Seleccione una fecha:</strong></label>
            <input type="date" name="fecha" value="2018-07-22"><br><br>

        <label for="number"><strong>Seleccione su numero favorito:</strong></label>
            <input type="number" name="number" id="textNumber">
        <br><br>
        <input type="submit" value="enviar">

        
	
</body>
</html>









<!-- Crea la página php: inicio.php
a) formulario de entrada con los siguientes valores:
 nombre del juego: deberá ser una cadena sin espacios en blanco.

 nombre de cada jugador: deberá tener más de 3 caracteres.

 cantidad de cartas por palo (corazones, diamantes, picas, tréboles) : 7 o 10. Por
defecto 10. Es la cantidad de cartas que tiene cada palo de la baraja.

 cartas: ( número de cartas por partida ) De 2.. 5. Por defecto 3. Es la cantidad de
cartas que sacará cada jugador.

 total: ( suma total máxima del juego ): cantidad que deben sumar las cartas, número
entero positivo. Por defecto 15. Es la cantidad de puntos que como máximo deben
sumar las cartas obtenidas por el jugador para no perder.

 euros por partida: número entero positivo superior a 0. Por defecto 5. Son los euros
que se apuestan en cada partida.

 presupuesto por jugador: cantidad de euros inicial que aporta cada jugador. Los dos
jugadores aportan la misma cantidad.

b) Crear un formulario de entrada donde se introduzcan los datos,
c) Comprobar si se han dado los valores correctos, e indicar el error específico en cada
caso. Si las comprobaciones son correctas se inicia el juego.
d) Utilizar sesiones para acceder, donde estará cargado el nombre del juego,
e) y un array con el resto de los parámetros del juego.
f) Acceder a la página juego.php -->
