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
	
	if (!empty($_GET['array'])) {
		$array = unserialize($_GET['array']);
		if (is_array($array)) {
			mostrar($array);
		}else {
			echo "No se ha enviado un array";
		}
	}else {
		$array = [
			"Fregar"  => "Usar la fregona en el suelo", 
			"Barrer"  => "Usar la escoba e nel suelo", 
			"Cocinar" => "Preparar la comida", 
			"Ordenar" => "Colocar lo desordenado"
		];
		$array = serialize($array);
		$array = urlencode($array);
		header("Location: ej1.php?array=" . $array);
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
			
			