<?php
   
    if (!empty($_GET['nombre']) && !empty($_GET['fecha_nacimiento']) && !empty($_GET['telefono']) ) {
        foreach ($_GET as $nombre => $valor) { 
            // ["nombre"]   => "Marco"
            // ["fecha"]    => string "2021-04-12" 
            // ["telefono"] => "666666666 "}
            $$nombre = $valor;
            echo ""
        }
        // echo $nombre;
        // echo "<br>";
        // echo $fecha_nacimiento;
        // echo "<br>";
        // echo $telefono;

       
    }else {
        echo "Rellene correctamente el formulario0";
        formulario();
    }

    
    
    function formulario() {
        ?>
        <form action="zzzzEj.php" method="get">
            <label for="txtNombre"><strong>Escriba su nombre:</strong></label>
                <input type="text" name="nombre" id="txtNombre" ><br><br>

            <label for="txtNombre"><strong>Escriba su fecha de nacimiento:</strong></label>
                <input type="date" name="fecha_nacimiento" id="txtNombre" ><br><br>

            <label for="txtNombre"><strong>Escriba su telefono:</strong></label>
                <input type="text" name="telefono" id="txtNombre" ><br><br>
            <input type="submit" value="enviar">
        </form>

        <?php
    }
?>