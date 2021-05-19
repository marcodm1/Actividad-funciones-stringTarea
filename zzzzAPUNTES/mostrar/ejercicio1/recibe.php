<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados.">
	</head>
	<body>
		<?php
		/*
			Crea una sola página web, que reciba información por GET.
			Debe recibir un array de tareas.
			Muestra el array en formato de tabla con un encabezado que ponga tareas pendientes, y dos columnas con el código de la tarea y la descripción.
			El código coincidirá con el índice del array que nos pasan, y la descripción con el contenido.
			Si no nos mandan la información o no tiene el formato adecuado (no es un array), nos deberá indicar el error correspondiente.
		*/
			if (!empty($_GET['tareas']) && is_array($_GET['tareas'])) {
				$array = $_GET['tareas'];
				mostrar($array);
			}else {
				echo "No ha recibido tareas o el formato no es el correcto";
			}

			function mostrar($array) {
				?>
				<table>
					<tr>
						<th colspan="2"> Tareas Pendientes: </th>
					</tr>
					<?php
					foreach ($array as $tarea => $descripcion) {
						echo "<tr>";
							echo "<td>" . $tarea . "</td>";
							echo "<td>" . $descripcion . "</td>";
						echo "</tr>";
					}
					?>
				</table>
				<?php
			}
			?>
	</body>
</html>
			
			