<!DOCTYPE html>
<html lang="en">
<head>
    <title>Marco Domínguez</title>
	<meta charset="UTF-8">
    <meta name="author"      content="Marco Dominguez">
    <meta name="description" content="ej 3">
</head>
<body>
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
        public function getNombre() {
            return  $this->nombre;
        }
        public function getApellidos() {
            return  $this->apellidos;
        }
        public function getPuntos() {
            return  $this->puntos;
        }
        public function setNombre($nombre, $valor) {
            $this->$nombre = $valor;
        }
        public function setApellidos($apellidos, $valor) {
            $this->$apellidos = $valor;
        }
        public function setPuntos($valor) {
            $this->puntos += $valor;
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

        public abstract function jugada();

        public function getGanador(){
            if ($this->jugadorA->getPuntos() > $this->jugadorB->getPuntos()) {
                return "El jugador ganador ha sido: " . $this->jugadorA->getNombre() . " con un total de: " . $this->jugadorA->getPuntos();
            }else {
                return "El jugador ganador ha sido: " . $this->jugadorB->getNombre() . " con un total de: " . $this->jugadorB->getPuntos();
            }
            if ($this->jugadorA->getPuntos() == $this->jugadorB->getPuntos()) {
                return "Ha sido un empate.";
            }
        } 
        public function getJugador($letra) {
            switch ($letra) {
                case "A":
                    return $this->jugadorA;
                    break;
                case "B":
                    return $this->jugadorB;
                    break;
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
            $nombre1 = $this->jugadorA->getNombre();
            $nombre2 = $this->jugadorB->getNombre();
 
            if ($tiradaA == $tiradaB) {
                echo "Empate: <br>";
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
            if ($tiradaA > $tiradaB) {
                echo "Gana " . $nombre1 . "<br>";
                $this->jugadorA->setPuntos(3);
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
            if ($tiradaA < $tiradaB){
                echo "Gana " . $nombre2 . "<br>";
                $this->jugadorB->setPuntos(3);
                mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB);
            }
        }
    }
    session_start();
    if (empty($_GET['jugar']) && empty($_GET['ver'])) {
        $participante1 = new Participante($_GET['nombre1'], $_GET['apellido1']);
        $participante2 = new Participante($_GET['nombre2'], $_GET['apellido2']);
        $juegoDados    = new JuegoDados($participante1, $participante2, 100);
        guardarPartida($juegoDados);
        mostrarJugadores($juegoDados);
        formJuego();
    }else {
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
    }
    function mostrarTirada($nombre1, $nombre2, $tiradaA, $tiradaB) {
        echo $nombre1 . " ha sacado un " . $tiradaA . "<br>";
        echo $nombre2 . " ha sacado un " . $tiradaB . "<br><br>";
    }
    function mostrarJugadores($juegoDados) {
        $nombreA    = $juegoDados->getJugador("A")->getNombre();
        $apellidosA = $juegoDados->getJugador("A")->getApellidos();
        $puntosA    = $juegoDados->getJugador("A")->getPuntos();

        $nombreB    = $juegoDados->getJugador("B")->getNombre();
        $apellidosB = $juegoDados->getJugador("B")->getApellidos();
        $puntosB    = $juegoDados->getJugador("B")->getPuntos();

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
            <form action="juego.php" method="get">
                Qué quiere hacer?
                <input type="submit" value="Jugar"          name="jugar" /> o
                <input type="submit" value="Ver resultados" name="ver" />
            </form>
        <?php   
    }
    ?>
</body>
</html>