<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ejercicio Bucles anidados.">
	</head>
	<body>
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
            $this->puntos   = $numero;

            if (empty($directorio)) {
                $this->directorio = Carta::RUTA; // "./img/"
            }else {
                $this->directorio = $directorio;
            }
        }

        public function crearFichero($palo, $numero) {
            $letra      = substr($palo, 0, 1);
            $numero     = $numero;
            $extension  = ".svg";
            $total      = "$letra$numero$extension";
            return $total;
        }

        public function crearNombre($palo, $numero) {
            $nombre = "$numero de $palo";
            return $nombre;
        }

        function getEtiquetaImg() {
            // ./img/c1.sgv
            ?>
            <img src="<?php echo $this->directorio?><?php echo $this->fichero?>" alt="<?php echo $this->fichero?>" width="100" height="100">
            <?php 
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function getPuntos() {
            return $this->numero;
        }
    }

    $picas10 = new Carta("picas", 10);
    $picas10->getEtiquetaImg();
    echo "<br>El nombre completo es: " . $picas10->getNombre() . " y tiene " . $picas10->getPuntos() . " puntos.<br><br><br>";

    $corazones9 = new Carta("corazones", 9);
    $corazones9->getEtiquetaImg();
    echo "<br>El nombre completo es: " . $corazones9->getNombre() . " y tiene " . $corazones9->getPuntos() . " puntos.<br><br><br>";

    $treboles1 = new Carta("tréboles", 1);
    $treboles1->getEtiquetaImg();
    echo "<br>El nombre completo es: " . $treboles1->getNombre() . " y tiene " . $treboles1->getPuntos() . " puntos.<br><br><br>";


?>
    </body>
</html>

