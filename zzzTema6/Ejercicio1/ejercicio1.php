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
            $this->fichero  = $this->crearFichero($this->palo, $this->numero);
            $this->nombre   = $this->crearNombre( $this->palo, $this->numero);

            if (empty($directorio)) {
                // "./img/"
                $this->directorio = RUTA;
            }else {
                $this->directorio = $directorio;
            }
        }

        public function crearFichero($palo1, $numero1) {
            $letra      = substr($palo1, 0, 1);
            $numero     = $numero1;
            $extension  = ".svg";
            $total = "$letra$numero$extension";
            return $total;
        }

        public function crearNombre($palo, $numero) {
            $completo = "$numero de $palo";
            return $completo;
        }

        function getEtiquetaImg() {
            ?>
            <img src="<?php echo $this->directorio?><?php echo $this->fichero?>" alt="corazones1" width=100 height=100>
            <?php 
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getPuntos() {
            return $this->numero;
        }
    }

    $picas1 = new Carta("picas", 10, "./img/");
    $picas1->getEtiquetaImg();
    echo "<br>El nombre completo es: " . $picas1->getNombre() . "<br><br><br>";

    $corazones1 = new Carta("corazones", 9, "./img/");
    $corazones1->getEtiquetaImg();
    echo "<br>El nombre completo es: " . $corazones1->getNombre() . "<br><br><br>";

    $treboles1 = new Carta("tréboles", 1, "./img/");
    $treboles1->getEtiquetaImg();
    echo "<br>El nombre completo es: " . $treboles1->getNombre() . "<br><br><br>";


?>

