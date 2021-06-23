<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="MVC1">
    <link rel="stylesheet" href="../estilo.css">
</head>
<body>
    <style>
        table {
            background-color: rgb(134, 139, 134);
        } 

        tr {
            background-color: rgb(139, 197, 112);
        }
    </style>
    <?php 

        $array = rellenarMaxNumeros(50);

        mostrar($array);


        function mostrar($array) {
            $cont = 1;
            echo "<br><br>";
            echo "<table>";
                echo "<tr>";
                foreach ($array as $numero) {
                    if ($cont == 10) {
                        echo '<td class="noSalidos">';
                        echo $numero;
                        echo "</td>";
                        echo "</tr>";
                        $cont = 1;
                    }else {
                        echo '<td class="noSalidos">';
                        echo $numero;
                        echo "</td>";
                        $cont ++;
                    }
                }

                echo "</tr>";
            echo "</table>";
            return "";
        }



        function rellenarMaxNumeros($numeros) {
            $array = array();
            for ($i = 1; $i < $numeros; $i++) {
                array_push($array, $i);
            }
            return $array;
        }

    ?>
</body>
</html>