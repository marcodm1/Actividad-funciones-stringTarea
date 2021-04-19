
<?php

	if (empty($_GET['tareas'])) {
		echo "No ha recibido tareas";
	}else {
		echo "<pre>";
		var_dump($_GET);
		echo "</pre>";
	}
	?>

	<table>
		<tr>
			<th> Tareas Pendientes: </th>
		</tr>
		<tr>
			<?php
			foreach ($_GET as $tarea => $descripcion) {
				echo "<td>" . $descripcion . "</td>";
			}
			?>
		</tr>
		
	</table>


