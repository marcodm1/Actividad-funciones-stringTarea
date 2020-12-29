<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if (!empty($_POST['archivo'])){
            // abro y leo archivo 
            $a = $_POST['archivo'];
            $archivo1 = fopen($a, "r") or die("No disponible el archivo seleccionado!"); 
            $variable = fread($archivo1, filesize($a)); // leo el archivo entero
            // almaceno el archivo en $variable
            // si en vez de una variable ponemos echo, lo mostraria
            fclose($archivo1);

            // abro y sobre escribo
            $archivo2 = fopen("texto2.txt", "w") or die("No disponible el archivo seleccionado!"); 
            fwrite($archivo2, $variable);
            fclose($archivo2);

            // abro y continuo el archivo
            $archivo3 = fopen("texto3.txt", "a") or die("No disponible el archivo seleccionado!"); 
            fwrite($archivo3, $variable);
            fclose($archivo3);

            // creamos un nuevo archivo texto4.txt con el contenido adawdawdw
            $archivo4 = fopen("texto4.txt", "x") or die("No disponible el archivo seleccionado!"); 
            fwrite($archivo4, "adawdawdw");
            fclose($archivo4);

        // fopen "devuelve" un objeto de tipo archivo.
            // Ej: fread(), fwrite()... dentro ponemos el archivo y despues la cantidad a hacer
            // filesize(texto.txt) devuelvo el tamaño del archivo en bites
            // fopen(a,b) abre archivo a de la manera b
            // r Abre un archivo de solo lectura. 
            // w Abre un archivo de solo escritura. Si existe el archivo, lo sobreescribe. Si no existe, crea un nuevo archivo. 
            // a Abre un archivo de solo escritura. Continua desde el final del archivo. Si no existe, crea un nuevo archivo. 
            // x Crea un nuevo archivo solo para escritura. Si existe, devuelve FALSE y un error



        }else {
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

                <input type="file" name="archivo" accept=".pdf, .jpg, .png, .txt" multiple />

                <input type="submit" value="enviar">

            <?php
        }


    ?>

</body>
</html>