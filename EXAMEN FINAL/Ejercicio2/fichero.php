<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Examen">
        <link rel="stylesheet" href="./estilo.css">
	</head>
	<body>

    <?php

        class Fichero {
            private $fichero;           // nombre
            private $cabeceras;         // que será la primera fila del fichero.
            private $filas;             // que serán las filas del fichero.
            const ERROR1 = "Se ha prodcido un error en la lectura";    // Todas las constantes que necesites para los mensajes de error que se produzcan en las operaciones de la clase. Estas constantes contienen el texto que describe el error
            const ERROR2 = "No existe el fichero";
            const ERROR3 = "Formato inadecuado";
            const ERROR4 = "Tiene demasiados pipes";
            const ERROR5 = "no se han cargado los datos del fichero";

            public function __construct($nombre = "datos.txt") {
                if (empty($nombre)) {
                    $this->fichero = "datos.txt";
                }else {
                    $this->fichero = $nombre;
                }
                $fopen = fopen($this->fichero, "r");
                $array = file($this->fichero);
                $this->filas     = $array;
                $this->cabeceras = $this->filas[0];
            }
            public function chequea_fichero() {
                $archivo    = __DIR__ . DIRECTORY_SEPARATOR . $this->fichero;
                $resultado  = true;

                if (!file_exists($this->fichero)) {
                    return Fichero::ERROR2;
                }
                if (!$fopen = fopen($archivo, "r")) {
                    return Fichero::ERROR1;
                }else {
                    $pipes = 0;
                    foreach ($this->filas as $linea) {
                        for ($i = 0; $i < strlen($linea); $i++) {
                            if ($linea[$i] == "|") {
                            $pipes ++;
                            }
                        }
                        if ($pipes != 4) {
                            return Fichero::ERROR4 . " en la linea " . $linea;
                        }
                        $pipes = 0;
                    }
                    
                }
                
                return $resultado;
            }

            public function cargar_fichero() {
                $archivo    = __DIR__ . DIRECTORY_SEPARATOR . $this->fichero;
                $resultado  = true;
                $fopen = fopen($archivo, "r");
                
                echo "<table>";
                
                    foreach ($this->filas as $linea) {
                        echo "<tr>";
                        if (is_numeric($linea[0])) {
                            echo "<td>";
                            echo $linea;
                            echo "</td";
                            echo "</tr>";
                        }else {
                            echo "<th>";
                            echo $linea;
                            echo "</th";
                            echo "</tr>";
                        }
                    }
                echo "</table>";
            }

            public function pinta_grafico() {
                $archivo    = __DIR__ . DIRECTORY_SEPARATOR . $this->fichero;
                $resultado  = true;

                if (!file_exists($this->fichero)) {
                    return Fichero::ERROR2;
                }
                if (!$fopen = fopen($archivo, "r")) {
                    return Fichero::ERROR1;
                }else {
                    $colegiados = array();
                    $veces = 0;
                    foreach ($this->filas as $linea) {
                        // comprobar repeticiones de los colegiados
                        array_push($colegiados, $linea[0]);
                    }
                }
                ?>
                    <img src="imagen.php" alt="img"><br>
                <?php
            }
        }

        $fichero = new Fichero();
        echo $fichero->chequea_fichero();
        $fichero->cargar_fichero();
        $fichero->pinta_grafico();
        
    ?>

</body>
</html>    