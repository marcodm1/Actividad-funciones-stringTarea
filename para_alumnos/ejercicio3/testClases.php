<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    require_once("clases.php");

    $sala1 = new Sala(200);
    $sala2 = new Sala(500);
    echo $sala1->getCapacidad();
    echo $sala2->getCapacidad();

    $comoTu = new Monitor("ComoTu", 1500, "Teimpo libre");

    $fechaMinutos = "fecha en minutos"; // esto esta mal
 
    do {
        $actividad = new Actividad("Actividad numero 1", $comoTu, $fechaMinutos, 100);   
    }while ($actividad->veces);
        
    $actividadG = new ActividadGrupal($sala1);

    var_dump($actividadG->alumnosMatriculados);

    $actividadG->addAlumno("Juan", "10-12-2020");
    $actividadG->addAlumno("Pedro", "12-10-2020");

    var_dump($actividadG->alumnosMatriculados);

    $actividadG->getDisponibles();
?>

</body>
</html>