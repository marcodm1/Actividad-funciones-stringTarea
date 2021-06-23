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
        const FILA        = 5;
        const COLUMNA     = 5;

        public function __construct() {
            Carton::crearCarton($this->numeros, $this->tachados);
            // self::$cantidadAlergenos ++;
        }
        public function __get($propiedad) {
            if (property_exists(__CLASS__, $propiedad)) {
                return $this->$propiedad;
            }
            return "No existe esa propiedad";
        }
        public function getNumeros() {
            return $this->numeros;
         
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
        public static function crearCarton(&$numeros, &$tachados) { // session
            $total    = self::FILA * self::COLUMNA;
            $numeros  = $numeros;
            $tachados = $tachados;
            $cont     = 0;
        
            for ($i = 0; $i < $total; $i++) {
                if ($cont == $total) {
                    // session_start(); // si pongo esto no crea las session
                    // sort($numeros);  // si los ordeno se me va todo a la mierda
                    $_SESSION['carton']         = $numeros;
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
    
    class Bingo {
        private $maxNumeros = array(); // usar las constantes de Carton
        private $extraidas  = array();
        private $total;
        const PRECIO_CARTON = 1;
        public static $recaudado = 0;

        public function __construct($numeros) {
            $this->maxNumeros = Bingo::rellenarMaxNumeros($numeros);
            $this->total      = $numeros;
        }
        public static function rellenarMaxNumeros($numeros) { // session
            $array = array();
            for ($i = 1; $i < $numeros; $i++) {
                array_push($array, $i);
            }
            $_SESSION['maxNumeros'] = $array;
            return $array;
        }
        public function muestraBingo() {
            $cont = 1;
            echo "<br><br>";
            echo "<table>";
                echo "<tr>";
                foreach ($this->maxNumeros as $numero) {
                    if ($cont == 10) {
                        $esta = array_search($numero, $this->extraidas);
                        if (is_numeric($esta)) {
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
                            $cont = 1;
                        }
                    }else {
                        $esta = array_search($numero, $this->extraidas);
                        if (is_numeric($esta)) {
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
                return false;
            }
            if (!empty($this->extraidas)) {
                do {
                    $aleatorio = rand(1, $this->total);
                    $esta      = array_search($aleatorio, $this->extraidas);
                    if (is_numeric($esta)) {
                        $repetido = true;
                    }else {
                        array_push($this->extraidas, $aleatorio);
                        $_SESSION['extraidas'] = $this->extraidas;
                        $repetido = false;
                        return true;
                    }
                }while($repetido);
            }else {
                $aleatorio = rand(1, $this->total);
                array_push($this->extraidas, $aleatorio);
                return true;
            } 
        }
        public function iniciaJuego() {
            $resultado = false;
            if (self::$recaudado > 0) {
                $resultado = true;
            }
            return $resultado;
        }
        public function __get($propiedad) { 
            if (property_exists(__CLASS__, $propiedad)) {
                return $this->$propiedad;
            }
            return "No existe esa propiedad";
        }
    }

    class Jugador {
    }






    $carton = new Carton();
    echo $carton;
    $numeros = ($carton::COLUMNA) * 10;
    //______________________________________
    $bingo = new Bingo($numeros);
    // if (!$bingo->iniciarJuego()) {
    //     echo "Error: el juego no se puede iniciar";
    // }
    $sacado = $bingo->sacarBola();
    $sacado = $bingo->sacarBola();
    $sacado = $bingo->sacarBola();
    $sacado = $bingo->sacarBola();
    $sacado = $bingo->sacarBola();
    $sacado = $bingo->sacarBola();
    $bingo->muestraBingo();
    // $bingo->iniciaJuego();
    // do {
    //     $sacado = $bingo->sacarBola();
    // }while($sacado);
    // echo "Juego terminado";
   
    //______________________________________



?>
</body>
</html>