<?php

    class Carta {
        const RUTA = "./img/";  //que es donde va a localizar el fichero que representa la carta, será el directorio 'img'
        private $directorio;    //carpeta donde está el fichero de imagen de la carta.
        private $fichero;       //fichero donde está la carta (solo el nombre del fichero no la ruta completa)
        private $nombre;        //nombre de la carta.
        private $puntos;        //puntos que tengo que contabilizar en la partida.
        private $palo;          //nombre del palo 
        private $numero;        //numero de la carta

        public function __construct($palo, $numero, $directorio = "") {
            $this->puntos   = $numero;
            $this->palo     = $palo;
            $this->numero   = $numero;
            $this->fichero  = crearFichero($this->palo, $this->numero);
            $this->nombre   = crearNombre($nombre, $palo);

            if (empty($directorio)) {
                // "./img/"
                $this->directorio = RUTA;
            }else {
                $this->directorio = $directorio;
            }
        }

        function crearFichero($palo1, $numero1) {
            $letra      = substr($palo1, 0, 1);
            $numero     = $numero1;
            $extension  = ".svg";
            return $letra . $numero . $extension;
        }

        function crearNombre($nombre, $palo) {
            return $nombre . $palo;
        }

        function getEtiquetaImg() {
            ?>
            <img src="<?php echo $this->directorio?>c1.svg" alt="corazones1"';
            <?php 
        }
    }

    $corazones1 = new Carta("corazones", 1, "./img/");
    $corazones1->getEtiquetaImg();
?>
