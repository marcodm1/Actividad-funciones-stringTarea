<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="Examen final">
    <link rel="stylesheet" href="./estilo.css">
</head>
<body>

<!-- Tiene que recordar los valores de todo -->
<!-- Validar todos los campos -->
   
    <form action="./cAlta.php" method="post">
        Datos de la operacion<br>
        <label for="numCod">Codigo</label> 
            <input type="number" name="codigo" id="numCod" value=""><br>

            <label for="nombre">Nombre del paciente</label>
                <select id="nombre" name="nombre[]" required>
                    <option value="">Seleccione</option>
                    <?php
                        foreach ($resultadosPacientes as $clave => $valor) {
                            foreach ($valor as $nombre) {
                                ?>
                                <option value="<?php echo $nombre ?>" ><?php echo $nombre ?></option>
                            <?php
                            }
                            
                        }
                    ?>
                </select><br>

                <label for="fecha">Fecha de la operacion</label>
                <input type="date" name="fecha" value="<?php echo date('Y-m-d', strtotime(date("y.m.d"))) ?>" ><br> <!-- otra opcion buena value="<php echo date('Y-m-d', strtotime(date("y.m.d"))) ?>" -->

                <label for="nombre">Sala de la operacion</label>
                <select id="sala" name="sala[]" required>
                    <option value="">Seleccione</option>
                    <?php
                        foreach ($resultadosSalas as $clave => $valor) {
                            foreach ($valor as $nombre) {
                                ?>
                                <option value="<?php echo $nombre ?>" ><?php echo $nombre ?></option>
                            <?php
                            }
                        }
                    ?>
                </select><br>

                <label for="turno">Turno</label>
                    <input type="radio" name="turno" value="mañana" id="mañana" >
                <label for="mañana">Mañana</label>
                    <input type="radio" name="turno" value="tarde" id="tarde" >
                <label for="tarde"> Tarde </label><br>

        <input type="submit" name="formulario" value="Alta"><br><br>
    </form>



</body>
</html>