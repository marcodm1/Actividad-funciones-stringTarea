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
            switch($atributo) {
                case "identificador": 
                    return $this->identificador;
                    break;
                case "nombre": 
                    return $this->nombre;
                    break;
                case "apellidos": 
                    return $this->apellidos;
                    break;
                case "puntos": 
                    return $this->puntos;
                    break;
            }
        }

    }
    abstract class Juego {
        private $jugadorA;
        private $jugadorB;
        private $premio;
      
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

        public function jugada() { // no consigo hacer esta parte
            $tiradaA = rand(0,6);
            $tiradaB = rand(0,6);

            if ($tiradaA > $tiradaB) {
                $this->jugadorA->puntos =  $this->jugadorA->puntos + 3;
            }else {
                $this->jugadorB->puntos =  $this->jugadorB->puntos + 3;
            }
            return "Dado del jugadorA = " . $tiradaA . "<br> Dado del jugadorB = " . $tiradaB;
        }
    }
    if (empty($_GET['nombre1']) || empty($_GET['apellido1']) || empty($_GET['nombre2']) || empty($_GET['apellido2']) ) {
        formulario();
    }
    
    if (empty($_SESSION) ) {
        session_start();
        $jugador1   = new Participante($_GET['nombre1'], $_GET['apellido1']);
        $jugador2   = new Participante($_GET['nombre2'], $_GET['apellido2']);
        $juegoDados = new JuegoDados($jugador1, $jugador2, 100);
        guardarPartida($pepe);
        guardarPartida($juan);
        $_SESSION['juego'] = $juegoDados;
        formJuego();

        // echo "<pre>";
        // print_r($_SESSION);
        // echo "</pre>";
        // session_destroy();
    }else {
        if ($_GET['eleccion'] == "jugar") {
            $_SESSION['juego']->jugada();
            echo "Participante 1: " . $pepe->nombre . " " . $pepe->apellidos . " con " . $pepe->puntos . " puntos" . "<br>";
            echo "Participante 2: " . $juan->nombre . " " . $juan->apellidos . " con " . $juan->puntos . " puntos" . "<br>";
            formJuego();
        }else {
            if ($_GET['eleccion'] == "ver") {
                echo "final ver";
                $juego1->getPremio();
                $juego1->getGanador();
                formJuego();
            }

        }
    
    }

    function guardarPartida($jugador) {
        $nombre = $jugador->nombre;
        $_SESSION["$nombre"] = $jugador;
    }
    
    function formJuego() {
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
                <label for="eleccion">Seleccione 1:</label><br>
                <label for="jugar">Jugar</label>
                    <input type="radio" name="eleccion" value="jugar">
                <label for="ver">Ver</label>
                    <input type="radio" name="eleccion" value="ver"><br><br><br>

                <input type="submit" value="enviar">
            </form>
        <?php   
    }
    ?>
