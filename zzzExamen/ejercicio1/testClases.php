<?PHP
    require_once("clases.php");    

    $gluten = new Alergeno("Gluten" , 150, 210, 170);
    // le doy el valor de mi objeto gluten
    $rojo  = 0; // 150
    $azul  = 0; // 210
    $verde = 0; // 170
    $gluten->getColor($rojo,$azul,$verde);

    $frutos = new Alergeno("Gluten" , 200, 150, 100);
    // le doy el valor de mi objeto gluten
    $rojo  = 0; 
    $azul  = 0; 
    $verde = 0;
    $frutos->getColor($rojo,$azul,$verde);
    //_______________________________________________________________

    $tomate     = new Ingrediente("Tomate", 10, 4, Ingrediente::LACTEO, $gluten); // si no pusiese el ultimo parametro, el constructor pone uno por defecto 
    $cesar      = new Ingrediente("Tomate", 20, 5, Ingrediente::ANIMAL, $frutos);
    $ketchup    = new Ingrediente("Tomate", 20, 5, Ingrediente::ANIMAL);
    $propiedad  = $ketchup->hh; // aqui llamo a una propiedad que no existe y el __getter magico me devuelve x
    echo $propiedad;
    echo "<br>";
    echo "Nombre original: " . $tomate->getNombre();
    $tomate->setNombre("exTomate");
    echo "<br> Nuevo nombre: " . $tomate->getNombre() . "<br>";
    //_______________________________________________________________

    $plato1 = new Plato("Bolognesa");
    $plato1->add($tomate, 334);
    $plato1->add($ketchup, 120);
    $plato1->add($cesar, 500);
    $plato1->recipiente("Plato");
    $plato1->cubiertos("Cuchillo", "Tenedor");

    echo $plato1->nombre;
    echo ":<br>Total precio: " . $plato1->precio();
    echo "<br>Total calorias: " . $plato1->calorias();
    $plato1->muestraPlato();

    //_______________________________________________________________

    $plato2 = new PlatoPreparado("Carbonara", 300, 5);
    $plato2->add($tomate, 300);
    echo $plato2->nombre;
    echo ":<br>Total precio: " . $plato2->precio();
    echo "<br>Total calorias: " . $plato2->calorias();
    $plato2->getFechaCaducidad();
    $plato2->muestraPlato();


   
    

?>
