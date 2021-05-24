<?php

    const BARRIO = "Usera";
    // define ("BARRIO", "Usera"); define es como const pero siempre son globales y nose puede usar dentro de 

    class Alumno {
        const INSTITUTO = "inst Tierno";
        private $moneda = MONEDA;
    }

    class Clase {
        const INSTITUTO = "inst de FP";
        public static function creaMuestraCTE() {
            const OTRACONSTANTE = "VALOR";
            echo OTRACONSTANTE;
        }    
    }

    echo MONEDA;
    echo BARRIO;

    echo Alumno::INSTITUTO;
    echo Clase::INSTITUTO;

?>