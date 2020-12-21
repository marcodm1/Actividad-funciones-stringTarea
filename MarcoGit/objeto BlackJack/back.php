
<?php
    session_start();

    // _______________________________JUGADOR_______________________________
    class Jugador {
        private $manoJugador = array();
        
        public function __construct($manoJugador) {
            $this->manoJugador = $manoJugador;
        }
        public function getSumaManoJugador() {
            $suma = 0;
            for ($i=0; $i<count($this->manoJugador); $i++){
                $suma += $this->manoJugador[$i];
            }
            return $suma;
        }
        public function setSumaManoJugador() {
            for ($i=0; $i<count($this->manoJugador); $i++){
                $this->manoJugador[$i] = 0;
            }
        }
        
      
        public function getManoJugador() {
                return $this->manoJugador;
        }

        public function setManoJugador() {
            $num = mt_rand(1, 13); // le doy una carta
            $this->manoJugador[] = $num;
        }

    }
    // _______________________________CASINO_______________________________
    class Casino {
        private $manoCasino     = array();
        private $listaJugadores = array();

        public function __construct($cartasMano, $listaJugadores){
            $this->manoCasino     = $cartasMano;
            $this->listaJugadores = $listaJugadores; // reemplaza un array por otro
        }
        public function getSumaManoCasino() {
            $suma = 0;
            for ($i=0; $i<count($this->manoCasino); $i++){
                $suma += $this->manoCasino[$i];
            }
            return $suma;
        }

        public function getManoCasino() {
                return $this->manoCasino;
        }
        public function setManoCasino() {
            $num = mt_rand(1, 13); // le doy una carta
            $this->manoCasino[] = $num;
        }
        public function getListaJugadores() {
                return $this->listaJugadores;
        }
        public function setListaJugadores($listaJugadores) {
                $this->listaJugadores = $listaJugadores;

                return $this;
        }
    }

    function guardarPartida($miJugador, $miCasino){

        if (empty($_SESSION['jugador'])) {
            $_SESSION['jugador'] = serialize($miJugador);
        }else {
            unset($_SESSION['jugador']);
            $_SESSION['jugador'] = serialize($miCasino);
        }

        if (empty($_SESSION['casino'])) {
            $_SESSION['casino'] = serialize($miCasino);
        }else {
            unset($_SESSION['casino']);
            $_SESSION['casino'] = serialize($miCasino);
        }
    }
    function otraCarta(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          
            <label for="otra"><strong>Desea una carta?</strong></label><br>
                    <label for="si">si</label>
                        <input type="radio" name="otra" value="si">
                    <label for="no">no</label>
                            <input type="radio" name="otra" value="no">

            <input type="submit" value="enviar">
        <?php
    }
    function contarMano($miJugador){
        $sumaMano = $miJugador->getSumaManoJugador();

        echo "Tienes una suma total de: " . $sumaMano . "<br>";
        if ($sumaMano > 21) {
            echo "Has perdido esta ronda<br>";
        }
        echo "Quieres otra carta?<br>";
        otraCarta(); 
        if ($_POST['otra'] == "si") {
            $miJugador->manoJugador[] = $num = mt_rand(1, 13); // le doy una carta
            contarMano($miJugador);
        }
    }
    function juegaCasino($miCasino) {
        añadirCartaAcasino($miCasino);
        if ($miCasino->getSumaManoCasino() > 21) {
            echo "Has ganado!";
        }
    }
    function añadirCartaAjugador($miJugador) {
        $miJugador->setManoJugador();
    }
    function añadirCartaAcasino($miCasino) {
        $miCasino->setManoCasino();
    }

    if (empty($_POST['otra'])) {
        echo "Hola " . $_SESSION['nombre'] . " comienza partida.<br>";
        $cartasEnLaMano = array();
        $miJugador = new Jugador($cartasEnLaMano);
        $arrayJ    = array();
        $arrayJ[]  = $miJugador;
        $miCasino  = new Casino($cartasEnLaMano, $arrayJ);

        añadirCartaAjugador($miJugador);
        añadirCartaAcasino($miCasino);
        añadirCartaAjugador($miJugador);
        añadirCartaAcasino($miCasino);
       
        contarMano($miJugador);
        guardarPartida($miJugador, $miCasino);
    }
    if ($_POST['otra'] == "si") {
        contarMano($_SESSION['jugador']);
    }else{
        juegaCasino($_SESSION['casino']);
        if ($miCasino->getSumaManoCasino() < $miJugador->getManoJugador()) {
            echo "Has ganado!";
        }else {
            echo "Has perdido!";
        }
    }

    
    
?>