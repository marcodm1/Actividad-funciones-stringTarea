<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="MVC1">
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
<?php
    class Carton {
        private $numeros  = array(); // total = FILA x COLUMNA
        private $tachados = array();
        const FILA        = 3;
        const COLUMNA     = 3;

        public function __construct() {
            Carton::crearCarton($this->numeros, $this->tachados);
        }

        public function __get($propiedad) {
            if (property_exists(__CLASS__, $propiedad)) {
                return $this->$propiedad;
            }
            return "No existe esa propiedad";
        }
        public function __toString() {
            $cont       = 0;
            $encontrado = false;
            echo "<table>";
            echo "<tr>";
            foreach ($_SESSION['carton'] as $numero1) {
                if ($cont == self::FILA -1) {
                    foreach ($_SESSION['cartonTachados'] as $tachado) {
                        if ($tachado == $numero1) {
                            $encontrado = true;
                                echo '<td class="tachado">';
                                    echo " X ";
                                echo "</td>";
                            echo "</tr>";
                            echo "<br>";
                            $cont = 0;
                            break;
                        }
                    }
                    if (!$encontrado) {
                            echo "<td>";
                                echo $numero1;
                            echo "</td>";
                        echo "</tr>";
                        echo "<br>";
                        $cont = 0;
                    }
                    $encontrado = false;
                }else {
                    foreach ($_SESSION['cartonTachados'] as $tachado) {
                        if ($tachado == $numero1) {
                            $encontrado = true;
                                echo '<td class="tachado">';
                                    echo "X";
                                echo "</td>";
                            $cont ++;
                            break;
                        }
                    }
                    if (!$encontrado) {
                            echo "<td>";
                                echo $numero1;
                            echo "</td>";
                        $cont ++;
                    }
                    $encontrado = false;
                }
            }
            echo "</table>";
            return "";
        }
        public static function crearCarton(&$numeros, &$tachados) {
            $total    = self::FILA * self::COLUMNA;
            $numeros  = $numeros;
            $tachados = $tachados;
            $cont     = 0;
        
            for ($i = 0; $i < $total; $i++) {
                if ($cont == $total) {
                    session_start();
                    $_SESSION['carton']         = "a"; // no entra aqui, pero no da error
                    $_SESSION['cartonTachados'] = $tachados;
                    return "crearCarton() terminado";
                    
                } 
                switch ($i) {
                    case 0:
                        do {
                            $repetido  = false;
                            $aleatorio = rand(1, 9);
                            foreach ($numeros as $numero) {
                                if ($numero == $aleatorio) {
                                    $repetido = true;
                                    break;
                                }
                            }
                        }while($repetido);
                        array_push($numeros, $aleatorio);
                        $cont ++;
                        if ($aleatorio < 4) {
                            array_push($tachados, $aleatorio);
                        }
                        break;
                    case 1:
                        do {
                            $repetido  = false;
                            $aleatorio = rand(10, 19);
                            foreach ($numeros as $numero) {
                                if ($numero == $aleatorio) {
                                    $repetido = true;
                                    break;
                                }
                            }
                        }while($repetido);
                        array_push($numeros, $aleatorio);
                        $cont ++;
                        if ($aleatorio < 14) {
                            array_push($tachados, $aleatorio);
                        }
                        break;
                    case 2:
                        do {
                            $repetido  = false;
                            $aleatorio = rand(20, 29);
                            foreach ($numeros as $numero) {
                                if ($numero == $aleatorio) {
                                    $repetido = true;
                                    break;
                                }
                            }
                        }while($repetido);
                        array_push($numeros, $aleatorio);
                        $cont ++;
                        if ($aleatorio < 24) {
                            array_push($tachados, $aleatorio);
                        }
                        break;
                    case 3:
                        do {
                            $repetido  = false;
                            $aleatorio = rand(30, 39);
                            foreach ($numeros as $numero) {
                                if ($numero == $aleatorio) {
                                    $repetido = true;
                                    break;
                                }
                            }
                        }while($repetido);
                        array_push($numeros, $aleatorio);
                        $cont ++;
                        if ($aleatorio < 34) {
                            array_push($tachados, $aleatorio);
                        }
                        break;
                    case 4:
                        do {
                            $repetido  = false;
                            $aleatorio = rand(40, 49);
                            foreach ($numeros as $numero) {
                                if ($numero == $aleatorio) {
                                    $repetido = true;
                                    break;
                                }
                            }
                        }while($repetido);
                        array_push($numeros, $aleatorio);
                        $cont ++;
                        if ($aleatorio < 44) {
                            array_push($tachados, $aleatorio);
                        }
                        $i = -1;
                        break;
                }
            }
        }
    } 
    $a = new Carton();
    // echo $a;
    
    class Bingo {
        private $maxNumeros = array(); // usar las constantes de Carton
        private $extraidas  = array();
        private $total;
        const PRECIO_CARTON = 1;

        public function __construct($numeros) {
            $this->maxNumeros = Bingo::rellenarMaxNumeros($numeros);
            $this->total      = $numeros;
        }
        public static function rellenarMaxNumeros($numeros) {
            $array = array();
            for ($i = 1; $i < $numeros; $i++) {
                array_push($array, $i);
            }
            return $array;
        }

        public function __toString() {
            $cont = 1;
            echo "<br><br>";
            echo "<table>";
                echo "<tr>";
                foreach ($this->maxNumeros as $numero) {
                    if ($cont == 10) {
                        if (array_search($numero, $this->extraidas) >= 0) {
                            echo '<td class="extraidas">';
                            echo $numero;
                            echo "</td>";
                            echo "</tr>";
                            $cont = 1;
                        }else {
                            echo '<td class="noextraidas">';
                            echo $numero;
                            echo "</td>";
                            echo "</tr>";
                            $cont ++;
                        }
                    }else {
                        if (array_search($numero, $this->extraidas) >= 0) {
                            echo '<td class="extraidas">';
                            echo $numero;
                            echo "</td>";
                            $cont ++;
                        }else {
                            echo '<td class="noextraidas">';
                            echo $numero;
                            echo "</td>";
                            $cont ++;
                        }
                    }
                }

                echo "</tr>";
            echo "</table>";
            return "";
        }

        public function sacarBola() {
            if (count($this->extraidas) == $this->total) {
                return "Se ha terminado el juego";
            }
            if (!empty($this->extraidas)) {
                do {
                    $aleatorio = rand(1, $this->total);
                    if (array_search($aleatorio, $this->extraidas) >= 0) {
                        $repetido = true;
                    }else {
                        array_push($this->extraidas, $aleatorio);
                        $repetido = false;
                    }
                }while($repetido);
            }else {
                $aleatorio = rand(1, $this->total);
                array_push($this->extraidas, $aleatorio);
            } 

        }
        public function muestraBingo() {

        }
    }
    // $numeros = ($a::COLUMNA) * 10;
    // $b = new Bingo($numeros);
    // echo $b;
    // $b->sacarBola();
    // $b->sacarBola();
    // $b->sacarBola();
    // $b->sacarBola();
    // $b->sacarBola();
    // $b->sacarBola();
    // echo $b;




    class Jugador {
        

    }


?>
</body>
</html>