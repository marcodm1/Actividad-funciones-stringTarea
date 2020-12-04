<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author" content="Marco Dominguez">
        <meta name="description" content="Black Jack">
	</head>
	<body>
    <?php
        trait Hola { 
            public function saludo($nombre) {
                echo "Hola" . $nombre;
             }
            
        }

        trait Adios { 
            public function saludo($nombre) {
                echo "Adios" . $nombre;
             }
            
        }

        class Mensaje {
            use Hola,Adios {
                Hola::saludo insteadOf Adios;
                Adios::saludo as despedida;
            }
        }
        

        $objeto = new Mensaje();

        $objeto->saludo("pedro");
        $objeto->despedida("pedro");


        ?>

    </body>
</html>
