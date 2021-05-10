<?php
    class Participante {
        private static $contador = 0;
        private $identificador;
        private $nombre;
        private $apellidos;
        private $puntos;
      
        public function __construct($nombre, $apellidos) {
            $this->identificador = ++ self::$contador;
            $this->nombre        = $nombre;
            $this->apellidos     = $apellidos;
            $this->puntos        = 0;
        }

        public function __get($atributo) {
            return $this->$atributo;
        }
        public function __set($atributo, $valor) {
            $this->$atributo = $valor;
        }

    }
    abstract class Juego {
        protected $jugadorA;
        protected $jugadorB;
        protected $premio;
      
        public function __construct(Participante $jugadorA, Participante $jugadorB, $premio) {
            $this->jugadorA = $jugadorA;
            $this->jugadorB = $jugadorB;
            $this->premio   = $premio;
        }

        public abstract function jugada(); // esto es una funcion no impementada

        public function getGanador(){
            if ($this->jugadorA->puntos > $this->jugadorB->puntos) {
                // return "El jugador ganador ha sido: " . $this->jugadorA . " con un total de: " . $this->jugadorA->puntos;
            
            }else {
                // return "El jugador ganador ha sido: " . $this->jugadorB . " con un total de: " . $this->jugadorB->puntos;
            
            }

            if ($this->jugadorA == $this->jugadorB) {
                return "Ha sido un empate.";
            }
        } 

        public function getPremio() {
            return "El premio es de: " . $this->premio;
        }

    }
    class JuegoDados extends Juego {
      
        public function __construct(Participante $jugadorA, Participante $jugadorB, $premio) {
            parent::__construct($jugadorA, $jugadorB, $premio); 
        }

        public function jugada() { 
            $tiradaA = rand(0,6);
            $tiradaB = rand(0,6);
            $nombre1 = $this->jugadorA->nombre;
            $nombre2 = $this->jugadorB->nombre;
 
            if ($tiradaA == $tiradaB) {
                echo "Empate: <br>";
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
            if ($tiradaA > $tiradaB) {
                echo "Gana " . $nombre1 . "<br>";
                $this->jugadorA->puntos += 3;
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
            if ($tiradaA < $tiradaB){
                echo "Gana " . $nombre2 . "<br>";
                $this->jugadorB->puntos += 3;
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
        }
    }

    if (empty($_GET['jugar']) && empty($_GET['ver'])) {
        echo "Solo se mostrara una vez:<br><br>";
        print_r($_POST);
        echo "<br><br>";
        session_start();
        $jugador1   = new Participante($_SESSION['jugador1Nombre'], $_SESSION['jugador1Apellido']);
        $jugador2   = new Participante($_SESSION['jugador2Nombre'], $_SESSION['jugador2Apellido']);
        $juegoDados = new JuegoDados($jugador1, $jugador2, 100);
        guardarPartida($jugador1);
        guardarPartida($jugador2);
        $_SESSION['juego'] = $juegoDados;
        mostrarActual($jugador1, $jugador2);
    }
    if (!empty($_GET['jugar']) ) {
        echo "Paso:3<br><br>";
        $_SESSION['juego']->jugada();
        guardarPartida($jugador1);
        guardarPartida($jugador2);
        mostrarActual($jugador1, $jugador2);
    }else {
        if (!empty($_GET['ver'])) {
            echo "Paso:5<br><br>";
            $_SESSION['juego']->jugada();
            echo "Participante 1: <br>" . $jugador1->nombre . ": ha terminado con: " . $jugador1->puntos . "<br>";
            echo "<br>Participante 1: <br>" . $jugador2->nombre . ": ha terminado con: " . $jugador2->puntos;
            echo "<br><br>";
            $_SESSION['juego']->getPremio();
            $_SESSION['juego']->getGanador();
            formJuego();
        }

    }
    
    function mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB) {
        echo $nombre1 . " ha sacado un " . $tiradaA . "<br>";
        echo $nombre2 . " ha sacado un " . $tiradaB . "<br><br>";
    }

    function mostrarActual($jugador1, $jugador2) {
        echo $jugador1->nombre . " " . $jugador1->apellidos . ": " . $jugador1->puntos . " puntos" . "<br>";
        echo $jugador2->nombre . " " . $jugador2->apellidos . ": " . $jugador2->puntos . " puntos" . "<br>";
        echo "<br>";
        formJuego();
    }

    function guardarPartida($jugador) {
        $nombre = $jugador->nombre;
        $_SESSION["$nombre"] = $jugador;
    }
    
    function formJuego() {
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <input type="submit" value="Jugar"          name="jugar" /> 
                <input type="submit" value="Ver resultados" name="ver" />
            </form>
        <?php   
    }
    ?>
