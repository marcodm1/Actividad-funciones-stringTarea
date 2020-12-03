<?php
    interface A { 
        const MAX_LENGTH = "100"; 
    }
    class XX implements A {
        public function __construct(){
            echo "construye un objeto A<br>";
        }
    }

    $x=new XX();
    echo a::MAX_LENGTH ; // Formas válidas de referenciar constantes de interfaces
    echo XX::MAX_LENGTH;
    echo $x::MAX_LENGTH;
    // class ZZ implements A { 
    //     const MAX_LENGTH = "500";
    // } // Error: no se permite sobreescribir constantes

?>