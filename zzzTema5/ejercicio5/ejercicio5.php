<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Ej x">
	</head>
	<body>
        <?php
            $errores = array();
            $textos  = array();
            $char    = ".";

            if (!empty($_POST['formulario'])) {
                if (empty($_POST['texto1'])){
                    $error = "<br>Error: No ha rellenado el campo1.<br>";
                    array_push($errores, $error);
                } 
                if (empty($_POST['texto2'])){
                    $error = "<br>Error: No ha rellenado el campo2.<br>";
                    array_push($errores, $error);
                }
                if (empty($_POST['texto3'])){
                    $error = "<br>Error: No ha rellenado el campo3.<br>";
                    array_push($errores, $error);
                }
                if (!empty($errores)) {
                    foreach ($errores as $error) {
                        echo $error;
                    }
                    formulario();
                }
                
                if (file_exists("datos.txt")) {
                    $archivo = __DIR__ . DIRECTORY_SEPARATOR . "datos.txt";
                    $fopen   = fopen($archivo, "w"); 
                    // fopen() con w siempre apunta al principio y en modo a lo pone al final
                    
                    echo ftell($fopen);
                    // fseek($fopen, -1, SEEK_END); // fseek solo es para escritura
                    // $fin = '|'.PHP_EOL; //fin de linea para los archivos
                    echo ftell($fopen);
                    fwrite($fopen, $_POST['texto1']);
                    fwrite($fopen, $_POST['texto2']);
                    fwrite($fopen, $_POST['texto3']);
                    echo "Añadido correctamente.";
                }else {
                    $archivo = __DIR__ . DIRECTORY_SEPARATOR . "datos.txt";
                    $fopen   = fopen($archivo, "w");
                    fwrite($fopen, $_POST['texto1']);
                    fwrite($fopen, $_POST['texto2']);
                    fwrite($fopen, $_POST['texto3']);
                    echo "Creado y rellenado correctamente.";
                }
                

            }else {
                formulario();
            }


            function formulario() {
                ?>
                <form action="ejercicio5.php" method="post">

                    <label for="txt1">Escriba la frase 1:</label>
                        <input type="text" name="texto1" id="txt1"><br>

                    <label for="txt2">Escriba la frase 2:</label>
                        <input type="text" name="texto2" id="txt2"><br>

                    <label for="txt3">Escriba la frase 3:</label>
                        <input type="text" name="texto3" id="txt3"><br>

                    <input type="submit" value="Enviar" name="formulario">
                </form>
                <?php
            }
        ?>
    </body>
</html>


<!-- Al enviar, añadir estas líneas a un fichero con nombre datos.txt.

Incluir en cada línea el carácter final de línea. 

Si el archivo datos.txt no existe lo creará, pero si existe añadirá la información al final.

Comprobar que al abrirlo tanto con notepad, como con block de notas lo muestra en líneas. -->