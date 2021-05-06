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

        public abstract function jugada($a, $b); // esto es una funcion no impementada

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

        public function jugada($jugador1, $jugador2) { 
            // tengo que poner las propiedades del padre protected
            // otra opcion es con getters magicos/especificos
            $tiradaA = rand(0,6);
            $tiradaB = rand(0,6);

            if ($tiradaA > $tiradaB) {
                $jugador1->puntos =  $jugador1->puntos + 3;
            }else {
                $jugador2->puntos =  $jugador2->puntos + 3;
            }
        }
    }
    
    session_start();
    $jugador1   = new Participante($_SESSION['jugador1Nombre'], $_SESSION['jugador1Apellido']);
    $jugador2   = new Participante($_SESSION['jugador2Nombre'], $_SESSION['jugador2Apellido']);
    $juegoDados = new JuegoDados($jugador1, $jugador2, 100);
    guardarPartida($jugador1);
    guardarPartida($jugador2);
    $_SESSION['juego'] = $juegoDados;
    formJuego();

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    // session_destroy();
    if (!empty($_GET['eleccion']) && $_GET['eleccion'] == "jugar") {
        $_SESSION['juego']->jugada($jugador1, $jugador2);
        echo "Participante 1: " . $jugador1->nombre . " " . $jugador1->apellidos . " con " . $jugador1->puntos . " puntos" . "<br>";
        echo "Participante 2: " . $jugador2->nombre . " " . $jugador2->apellidos . " con " . $jugador2->puntos . " puntos" . "<br>";
        formJuego();
    }else {
        if (!empty($_GET['eleccion']) && $_GET['eleccion'] == "ver") {
            echo "final ver";
            $_SESSION['juego']->getPremio();
            $_SESSION['juego']->getGanador();
            formJuego();
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
