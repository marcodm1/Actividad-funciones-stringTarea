
<?php
	if (empty($_GET['tareas'])) {
		echo "No ha recibido tareas o el formato no es el correcto";
	}else {
		$array = unserialize($_GET['tareas']);
		// echo "<pre>";
		// var_dump($array);
		// echo "</pre>";
	}
	?>

	<table>
		<tr>
			<th> Tareas Pendientes: </th>
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

