<?php
    /* Formas de abrir el archivo.
        r Abre un archivo de solo lectura. 
        w Si existe el archivo, lo sobreescribe. Si no existe, crea un nuevo archivo. 
        a Continua desde el final del archivo.   Si no existe, crea un nuevo archivo. 
        x Crea un nuevo archivo solo para escritura. Si existe, devuelve FALSE y un error
    */

    /* 
                    metodos abrir/leer:

        fopen("archivo.txt", "r");  Devuelve el contenido del fichero. y puede abrir links... archivos..
        fgets("archivo.txt", 12);   Devuelve el fichero
        file("archivo.txt");        Devuelve el fichero como un array 
        
                    metodos modificar/sobreescribir:



                        
        fclose("archivo.txt");      Cierra el puntero a un archivo abierto por fopen(); es un boolean
    */


?>
