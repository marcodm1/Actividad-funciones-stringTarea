<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="ejercicioExamen">
</head>
<body>

<?php
    session_start();
    session_destroy();
    if (isset($_POST['numero'])) {
        echo "Carton:<br>";
        $carton = $_SESSION['partida'];
        $carton = unserialize($carton);
        $carton->tachaNumero($_POST['numero']);
        $carton->comprobarCarton();
        $carton->muestraCarton();
        $carton->guardarProgreso(serialize($carton));
        mostrarFormulario();
    }else {
        $carton = new Carton();
        echo "Carton:<br>";
        $carton->muestraCarton();
        $carton->guardarProgreso(serialize($carton));
        mostrarFormulario();
    }
              
    function mostrarFormulario(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <label for="gg3">Escriba un numero para tachar:</label>
                    <input type="number" name="numero" id="gg3"><br><br>

                <input type="submit" value="enviar">
            </form> 
        <?php
    }

    class Carton {
        public $elCarton;
        public $totalNumerosCarton;
        const FILA    = 5;
        const COLUMNA = 5;

        function __construct() {
            $this->elCarton         = array();
            $this->totalNumerosCarton = array();

            for ($i = 0; $i < self::FILA; $i++) {
                $fila = array();
                for ($j = 0; $j < self::COLUMNA; $j++) {
                    switch ($j) {
                        case 0: $aleatorio = rand(1, 15);
                            break;
                        case 1: $aleatorio = rand(16, 30);
                            break;
                        case 2: $aleatorio = rand(31, 45);
                            break;
                        case 3: $aleatorio = rand(46, 60);
                            break;
                        case 4: $aleatorio = rand(61, 75);
                            break;
                    }
                    $encontrado = false;
                    foreach ($this->totalNumerosCarton as $numero) {
                        if ($aleatorio == $numero) {
                            $encontrado = true;
                        }
                    }
                    if ($encontrado) {
                        $j--;    
                    }else {
                        array_push($fila, $aleatorio);
                        array_push($this->totalNumerosCarton, $aleatorio);
                    }   
                }
                array_push($this->elCarton, $fila);
            }
        }

        public function muestraCarton() {
            foreach ($this->elCarton as $fila => $array) {
                if (is_array($array)) {
                    foreach ($array as $posicion => $numero) {
                        echo($numero . " ");
                    }
                }
                echo "<br>";
            }

        }

        public function tachaNumero($num) {
           for ($i = 0; $i < count($this->elCarton); $i++) {
                for ($j = 0; $j < count($this->elCarton[$i]); $j++) {
                    if ($this->elCarton[$i][$j] == $num) {
                        $this->elCarton[$i][$j] = "X";
                    }
                }
            }
        }

        public function guardarProgreso($carton) {
            session_start();
            $_SESSION['partida'] = $carton;
        }

        public function comprobarCarton() {
            $cont  = 0;
            $filas = 0;
            for ($i = 0; $i < count($this->elCarton); $i++) {
                for ($j = 0; $j < count($this->elCarton[$i]); $j++) {
                    $posicion = $this->elCarton[$i][$j];
                    if ($posicion == "X") {
                        $cont ++;
                        if ($cont == self::COLUMNA) {
                            $filas ++;
                            $cont = 0;
                        }
                        if ($filas == self::COLUMNA) {
                            header("Location:victoria.php");
                        }
                    }else {
                    }
                }
            }
        }

    }

    class Bingo Extends Carton {
        public $numMaximo; // 75
        public $recaudado;
        public $premio;
        const PRECIO_CARTON = 2;
        

        function __construct() {
            parent::__construct($elCarton, $totalNumerosCarton); 
            $this->numMaximo = array();
            for ($i = 0; $i < 75; $i++) {
                $this->numMaximo[$i] = $i;
            }
            $this->recaudado = 0;
            $this->premio    = 0;
        }

        function sacarBola() {
            $cont = 0;
            foreach ($this->numMaximo as $posicion => $numero) {
                if ($numero == "0") {
                    $cont ++;
                    if ($cont == 75) {
                        echo "TODAS LAS BOLAS HAN SIDO SACADAS!";
                    }
                }
            }

            $encontrado = false;
            do {
                $bola = rand(1, 75);
                foreach ($this->numMaximo as $posicion => $numero) {
                    if ($numero == $bola) {
                        $numero = "·";
                        $encontrado = true;
                    }
                }
            } while($encontrado == false);

        }

        function iniciaJuego() {
            $iniciado = false;
            if ($this->recaudado > 0) {
                $iniciado = true;
            }
            return $iniciado;
        }
        // no se podra comprar mas cartones
        // Se establece el precio del bingo según lo recaudado.
        // El 50% de lo recaudado, se destinará para el premio del bingo
    }

    function comprarCarton() {
        // Devuelve un cartón o null, si el bingo ya ha sido iniciado.
        // Si se pueden vender cartones: añade el precio del cartón a lo recaudado.
        // Si no se pueden comprar cartones: entonces devolverá null
    }

    function pagaBingo() {
        
    }


?>
</body>
</html>