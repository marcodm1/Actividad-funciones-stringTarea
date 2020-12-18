
<?php
    if (!isset($_POST['nombre']) && !isset($_POST['dinero'])){
        echo "Error: no ha introducido alguno de los campos.";
    }
    if (!isset($_POST['continuar'])){
        echo "Error: no ha seleccionado nada.";
    }
     // es para leer la session del objeto...
    // $object = unserialize($_SESSION['nombre']); 

    // _______________________________JUGADOR_______________________________
    class Jugador {
        private $dineroCartera;
        private $manoJugador = array();
        
        public function __construct($dineroCartera) {
            $this->dineroCartera = $dineroCartera;
        }
        public function getSumaManoJugador() {
            $suma = 0;
            for ($i=0; $i<count($this->manoJugador); $i++){
                $suma += $this->manoJugador[$i]->getNumeroCarta();
            }
            return $suma;
        }
        // public function apostar($num) {
        //     if ($num < $this->dineroCartera) {
        //         $this->dineroCartera -= $num;
        //         return $num;
        //     }else {
        //         $error = "Error: No puedes apostar mas de lo que tienes total.";
        //         return $error;
        //     }
        // }
        // public function getDineroCartera() {
        //     return $this->dineroCartera;
        // }
        // public function setDineroCartera($num) {
        //     if ($num >= 0) {
        //         $this->dineroCartera += $num;
        //     }else {
        //         $this->dineroCartera -= $num;
        //     }
        // } 
        // public function getManoJugador() {
        // }
        // public function setManoJugador() {
        // }
        
        // public function cambiarAS($num) {  
        //     if ($num == 1) {
        //         return $this->numeroCarta = 11;
        //     }else {
        //         return "Error: Solo se puede modificar el 1 por el 11.";
        //     }  
        // }
        // public function pedirCarta($respuesta){
        //     if ($respuesta) {
                
        //     }else {
        //         // finalizarRonda();
        //     }
        // }
      

        

    }
    // _______________________________CASINO_______________________________
    class Casino {
        // private $caja;
        private $manoCasino = array();

        public function __construct($num){
            $this->caja = $num;
        }
        
        public function getSumaManoCasino() {
            $suma = 0;
            for ($i=0; $i<count($this->manoCasino); $i++){
                $suma += $this->manoCasino[$i]->getNumeroCarta();
            }
            return $suma;
        }
        public function empezarPartida(){ 
            // repartir cartas a todos los jugadores
            for ($i=0; $i<2; $i++) { // numero de jugadores
                for ($i=0; $i<2; $i++) { // 2 cartas por cada jugador
                    if ($i == 0) {
                        // $num          = mt_rand(1, 13);
                        // $nuevaCarta   = new Carta($num);
                        // $this->manoCasino[] = $nuevaCarta;
                        // $this->baraja->quitarCarta($nuevaCarta);
                    }else {
                        $num          = mt_rand(1, 13);
                        $nuevaCarta   = new Carta($num);
                        $this->manoJugador[] = $nuevaCarta;
                        // $this->baraja->quitarCarta($nuevaCarta);
                    }
                }
            }
        }
        public function repartirUna() {

        }

        // public function getCaja(){
        //     return $this->caja;
        // }
        // public function setCaja($num) {
        //     if ($num >= 0) {
        //         $this->caja += $num;
        //     }else {
        //         $this->caja -= $num;
        //     }
        // } 
        // public function getManoCasino() {
        // }
        // public function setManoCasino() {
        // }


        // public function quitarCarta($carta) {
        //     for ($i=0; $i<count($this->baraja); $i++) {
        //         if ($this->baraja[$i]->getNumeroCarta() == $carta->getNumeroCarta()) {
        //             unset($this->baraja[$i]);
        //         }
        //     }
        // }
        
        // public function finalizarRonda() {
        //     $casino  = $this->casino->getSumaManoCasino();
        //     $jugador = $this->jugador->getSumaManoJugador();
        //     if ($casino >= $jugador) {
        //         $this->caja->setCaja($this->apuesta);
        //         $this->jugador->setDineroCartera($this->apuesta);
        //     }
        // }
        // public function entregarDinero() {}
        // public function recogerDinero() {}
    }
    // _______________________________CARTA_______________________________
    class Carta {
        private $numeroCarta;
         
        public function __construct($num){
            switch ($num){
                case 1: 
                    if ($num >0 && $num <10){
                        return $this->numeroCarta = $num;
                    }
                case 2:
                    if ($num >= 10 && $num <14){
                        return $this->numeroCarta = 10;
                    }
            }
        }
        public function getNumeroCarta() {
            return $this->numeroCarta;
        }
    }  
    // _______________________________BARAJA_______________________________
    // class Baraja { 
    //     private $baraja = array();
        
    //     public function __construct(){
    //         for ($i=0; $i<4; $i++){
    //             for ($j=1; $j<14; $j++){
    //                 $baraja[] = new Carta($j);
    //             }
    //             $j = 1;
    //         }
    //     }
    // }
    // _______________________________PROGRAMA_______________________________

    // crear jugador
    $miJugador = new Jugador(100);
    // crear casino
    $miCasino = new Casino(1000);
    // crear baraja 
    // $miBaraja = new Baraja();
    

    // -------- 1ª partida ---------

    $miCasino->empezarPartida();
    guardarPartida();
    $miJugador->getSumaManoJugador(); // 5-10
    seguirJugando();
    if ($_POST['continuar'] == 'no') {
        // finalizarRonda();
    }else {
        
    }
    
    // if ($jugador->){

    // }
    
    // casino reparte1
    // jugador se planta

    // casino se reparte
    // casino se reparte
    // casino se reparte
    // casino se pasa
    // casino da dinero
    // partida finalziada

    // 2ª partida

    // casino reparte
    // jugador pide
    // casino reparte1
    // jugador pide
    // jugador se pasa
    // casino recoje dinero
    // partida finalizada

    
    // _______________________________FUNCIONES_______________________________

    function seguirJugando(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
          
            <label for="continuar"><strong>Desea otra carta?</strong></label>
                    <label for="si">si</label>
                        <input type="radio" name="continuar" value="si">
                    <label for="no">no</label>
                            <input type="radio" name="continuar" value="no">

            <input type="submit" value="enviar">
        <?php
    }
    function guardarPartida(){
        session_start();
        // crear session con un objeto
        $object = new Jugador(100);
        $_SESSION['jugador'] = serialize($object);
    
        $object2 = new Casino(100);
        $_SESSION['casino'] = serialize($object2);
    
        $object3 = new Baraja(100);
        $_SESSION['baraja'] = serialize($object3);
    }
?>