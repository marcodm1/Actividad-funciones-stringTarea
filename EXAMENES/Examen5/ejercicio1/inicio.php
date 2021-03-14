<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <?php
        if (empty($_COOKIE['nombre'])){
            echo "Error: ingrese en la pagina desde la pagina principal.";
        }else {

            $textosEspañol   = array();
            $textosEspañol[] = "Hola ";
            $textosEspañol[] = $_COOKIE['nombre'];
            $textosEspañol[] = " nivel: ";
            if ($_COOKIE['nivel'] == 1 || $_COOKIE['nivel'] == 2) {
                $textosEspañol[] = "facil";
            }
            if ($_COOKIE['nivel'] == 3 || $_COOKIE['nivel'] == 4) {
                $textosEspañol[] = "medio";
            }
            if ($_COOKIE['nivel'] == 5) {
                $textosEspañol[] = "dificil";
            }
            
        
            $textosIngles   = array();
            $textosIngles[] = "Hi ";
            $textosIngles[] = $_COOKIE['nombre'];
            $textosIngles[] = " level: ";
            if ($_COOKIE['nivel'] == 1 || $_COOKIE['nivel'] == 2) {
                $textosIngles[] = "easy";
            }
            if ($_COOKIE['nivel'] == 3 || $_COOKIE['nivel'] == 4) {
                $textosIngles[] = "medium";
            }
            if ($_COOKIE['nivel'] == 5) {
                $textosIngles[] = "hard";
            }
        
        
            $idioma = $_COOKIE['idioma'];
            ?>
                <div class="registro">
                    <?php
                        if ($idioma == "español") {
                            for ($i = 0; $i < count($textosEspañol); $i++) {
                                ?>
                                    <h1 class="text">
                                        <?php 
                                            echo $textosEspañol[$i];
                                        ?>
                                    </h1>
                                <?php
                            }
                        }else {
                            for ($i = 0; $i < count($textosIngles); $i++) {
                                ?>
                                    <h1 class="text">
                                        <?php 
                                            echo $textosIngles[$i];
                                        ?>
                                    </h1>
                                <?php
                            }
                        }
                    ?>
                </div>  
            <?php  
        
            // mostrarCookies();
            // function mostrarCookies(){
            //     foreach ($_COOKIE as $clave => $valor){
            //         echo "$clave => $valor  <br>";
            //     }
            // }
        }

    ?>
    
</body>
</html>