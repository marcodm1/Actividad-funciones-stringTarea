<?php
    // abrir para modificar
    $archivo  = "texto.txt";
    $archivo1 = fopen($archivo, 'w') or die("No disponible el archivo seleccionado!"); 

    if ($archivo1){
        sobreescribirParte();
        sobreescribirLinea();
        sobreescribirTodo();
    }else {
        echo "Error al abrir el archivo";
    }
     if (fclose($archivo1)){
        echo "<br><br>El archivo se ha cerrado correctamente <br><br>";
    }


    function sobreescribirParte() {
        
    }
    function sobreescribirLinea() {

    }
    function sobreescribirTodo() {
        fwrite($archivo1, "Hijo de puta");
    }



?>
<!-- 
    Este es el texto del archivo texto.txt en
    Aqui vamos a escribir la segunda linea
    y para finalizar, aqui la tercera linea.
 -->