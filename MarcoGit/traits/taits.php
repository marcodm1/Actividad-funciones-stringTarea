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
        trait Info { // es como una interfaz pero no hace falta meter todo el codigo
            function getType() {
                return $this->tipo;
             }
            function getDescripcion() {
                return $this->descripcion;
             }
        }

        class A {
           
        }

        class X {
         
        }

        class B extends A {
            use Info; // simplemente ponemos esto y usa lo del traits
            private $tipo;
            private $descripcion;
            public function __construct($tipo, $descripcion){
                $this->tipo = $tipo;
                $this->descripcion = $descripcion;
            }
             
        }
        class C extends X {
             use Info; ….. 
        }

        ?>

    </body>
</html>

