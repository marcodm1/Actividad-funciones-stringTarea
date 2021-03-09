<?PHP
/*
Crea una página web testClases.php para probar las clases donde:
a. Crea los alérgenos: gluten, huevo y frutos_secos.
b. Crea al menos 4 ingredientes, alguno de los cuales tiene que tener un alérgeno.
c. Crea dos o tres platos, de los distintos tipos.
d. Muestra los platos por pantalla, utilizando los métodos adecuados.
*/


    require_once("clases.php");    

    $gluten = new Alergeno("Gluten" , 150, 210, 170);
    // le doy el valor de mi objeto gluten
    $rojo  = 0; // 150
    $azul  = 0; // 210
    $verde = 0; // 170
    $gluten->getColor($rojo,$azul,$verde);
    //_______________________________________________________________

    $tomate = new Ingrediente("Tomate", 12, 3, Ingrediente::LACTEO, $gluten); // si no pusiese el ultimo parametro, el constructor pone uno por defecto 

    $plato1 = new Plato("bolognesa");
    $palto1->add($tomate, 300);

    //_______________________________________________________________



    $bolognesa    = new Plato("Bolognesa");
    $bolognesa->add("pasta", 450);
    
    $carbonara    = new Plato("Carbonara");
    $carbonara->add("nata", 300);


    var_dump($bolognesa);
    var_dump($carbonara);

    

?>
