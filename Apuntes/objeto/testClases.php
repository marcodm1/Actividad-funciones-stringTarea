<?PHP
    require_once("clases.php");    

    $arrayAlergenos = array();
    $gluten = new Alergeno("Gluten" , 150, 210, 170);
    $arrayAlergenos[] = $gluten;
    // le doy el valor de mi objeto gluten
    $rojo  = 0; // 150
    $azul  = 0; // 210
    $verde = 0; // 170
    $gluten->getColor($rojo,$azul,$verde);

    // _______
    $perejil = new Alergeno("Perejil" , 100, 100, 100);
    $arrayAlergenos[] = $perejil;
    //_________
    $frutos = new Alergeno("Frutos" , 200, 150, 100);
    $arrayAlergenos[] = $frutos;
    // le doy el valor de mi objeto gluten
    $rojo  = 0; 
    $azul  = 0; 
    $verde = 0;
    $frutos->getColor($rojo,$azul,$verde);
    echo $frutos; // si hacemos un echo de un objeto, automatico se llama al __toString();
    echo "Cuantos alergenos se han creado? " . Alergeno::$cantidadAlergenos . ".<br>"; // pregunto por el atribujo de la clase, no del objeto

    // mostrar los alergenos
    for ($i = 0; $i < count($arrayAlergenos); $i++) {
        echo "El alergeno nº " . $i . ", es el " . $arrayAlergenos[$i]->getNombre() . "<br>";
    }
    // ordenar los alergenos por nombre, usando usort que es como el short pero para objetos
    Alergeno::ordenar($arrayAlergenos);

    echo "Aqui la misma lista pero ordenada por nombre.<br>";
    for ($i=0; $i<count($arrayAlergenos); $i++) {
        echo "El alergeno nº " . $i . ", es el " . $arrayAlergenos[$i]->getNombre() . "<br>";
    }

    //_______________________________________________________________

    $tomate     = new Ingrediente("Tomate", 10, 4, Ingrediente::LACTEO, $gluten); // si no pusiese el ultimo parametro, el constructor pone uno por defecto 
    $cesar      = new Ingrediente("Tomate", 20, 5, Ingrediente::ANIMAL, $frutos);
    $ketchup    = new Ingrediente("Tomate", 20, 5, Ingrediente::ANIMAL);
    $propiedad  = $ketchup->hh; // aqui llamo a una propiedad que no existe y el __getter magico me devuelve x
    echo $propiedad;
    echo "<br>";
    echo "Nombre original: " . $tomate->nombre;
    $tomate->nombre = "exTomate";
    echo "<br> Nuevo nombre: " . $tomate->nombre . ".<br>";

    echo $tomate->resumen . ".<br>";
    $tomate->nombre = "Tomate";
    echo "Vuelvo a cambiarlo el nombre a: " . $tomate->nombre . ".<br>";
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
