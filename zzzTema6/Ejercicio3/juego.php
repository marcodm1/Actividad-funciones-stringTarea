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
                return "El jugador ganador ha sido: " . $this->jugadorA . " con un total de: " . $this->jugadorA->puntos;
            }else {
                return "El jugador ganador ha sido: " . $this->jugadorB . " con un total de: " . $this->jugadorB->puntos;
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
                $this->jugadorA->puntos += 3; // valdra sin el + ??
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
            if ($tiradaA < $tiradaB){
                echo "Gana " . $nombre2 . "<br>";
                $this->jugadorB->puntos += 3;
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
        }
    }
    session_start();
    session_destroy();
    session_start();
    if (empty($_GET['jugar']) && empty($_GET['ver'])) {
        $participante1 = new Participante($_GET['nombre1'], $_GET['apellido1']);
        $participante2 = new Participante($_GET['nombre2'], $_GET['apellido2']);
        $juegoDados    = new JuegoDados($participante1, $participante2, 100);
        guardarPartida($juegoDados);
        mostrarJugadores($juegoDados);
        formJuego();
    }
    if (!empty($_GET['jugar']) ) {
        $juegoDados = cargarPartida();
        $juegoDados->jugada();
        guardarPartida($juegoDados);
        mostrarJugadores($juegoDados);
        formJuego();
    }else {
        if (!empty($_GET['ver'])) {
            $juegoDados = cargarPartida();
            mostrarJugadores($juegoDados);
            $juegoDados->getPremio();
            $juegoDados->getGanador();
        }

    }
    
    function mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB) {
        echo $nombre1 . " ha sacado un " . $tiradaA . "<br>";
        echo $nombre2 . " ha sacado un " . $tiradaB . "<br><br>";
    }
    function mostrarJugadores($juegoDados) {
        $nombreA    = $juegoDados->::jugadorA->nombre; // revisar com oentrar a las protecteds
        $apellidosA = $juegoDados->jugadorA->apellidos;
        $puntosA    = $juegoDados->jugadorA->puntos;

        $nombreB    = $juegoDados->jugadorB->nombre;
        $apellidosB = $juegoDados->jugadorB->apellidos;
        $puntosB    = $juegoDados->jugadorB->puntos;

        echo $nombreA . " " . $apellidosA . ": " . $puntosA . " puntos" . "<br>";
        echo $nombreB . " " . $apellidosB . ": " . $puntosB . " puntos" . "<br>";
        echo "<br>";
    }

    function guardarPartida($juegoDados) {
        $_SESSION["juegoDados"] = $juegoDados;
    }
    function cargarPartida() {
        return $_SESSION["juegoDados"];
    }
    function formJuego() {
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                Qué quiere hacer?
                <input type="submit" value="Jugar"          name="jugar" /> o
                <input type="submit" value="Ver resultados" name="ver" />
            </form>
        <?php   
    }
    ?>



<?php 
    class Coche {
        protected $potencia;
        // constructor ...
    }
    class Motor extends Coche{
        private $kv;

        // constructor....{
            //  parent::__constructor...
        // }
    }


?>