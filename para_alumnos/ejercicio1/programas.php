<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="ejercicioExamen">
</head>
    <body>
        <table>
            <?php
                $temas   = [];
                $temas[] = ['gallina', 'avestruz', 'gaviota', 'loro', 'gorrion', 'aguila'];

                $temaSeleccionado = rand(0, count($temas));
                $temaSeleccionado = $temas[$temaSeleccionado];

                $aleatorias = [];
                for($i = 0; $i < 15; $i++) {
                    $aleatorias[] = "";
                    for($j = 0; $j < 15; $j++) {
                        $aleatorias[$i] .= chr(rand(97, 122));
                    }
                }

                for($i = 0; $i < 15; $i++) {
                    echo '<tr>';
                    for($j = 0; $j < 15; $j++) {
                        echo "<td>$aleatorias[$i][$j]</td>";
                    }
                    echo'</tr>';
                }
            ?>
        </table>
    </body>
</html>
