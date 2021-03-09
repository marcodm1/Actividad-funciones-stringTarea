<?PHP
/*
Crea una página web testClases.php para probar las clases donde:
a. Crea los alérgenos: gluten, huevo y frutos_secos.
b. Crea al menos 4 ingredientes, alguno de los cuales tiene que tener un alérgeno.
c. Crea dos o tres platos, de los distintos tipos.
d. Muestra los platos por pantalla, utilizando los métodos adecuados.
*/


    require_once("clases.php");    

    $gluten       = new Alergeno("Gluten", 150, 210, 170);
    $huevo        = new Alergeno("Huevo", 200, 210, 1500);
    $frutos_secos = new Alergeno("Frutos_secos", 230, 110, 170);

    $tomate       = new Ingrediente("Tomate", 12, 3, 2, false);
    $lechuga      = new Ingrediente("Lechuga", 8, 1, 2, false);
    $pasta        = new Ingrediente("Pasta",  15, 5, 4, $gluten);
    $carne        = new Ingrediente("Carne",  12, 3, 2, false); 

    $bolognesa    = new Plato("Bolognesa");
    $bolognesa->add("pasta", 450);
    $carbonara    = new Plato("Carbonara");
    $carbonara->add("nata", 300);


    var_dump($bolognesa);
    var_dump($carbonara);
?>