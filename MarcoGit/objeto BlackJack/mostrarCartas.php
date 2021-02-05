<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form class="otraCarta" action="<php echo $_SERVER['PHP_SELF'] ?>" method="POST">  
        
    <input type="submit" value="cambiar img">

    <php
        $cartas = array();
        $num = mt_rand(1,13);
        $imagen = "baraja/corazones/" . $num . ".png";
        ?>
        <img src="<php echo $imagen;?>">
        <php
    ?>

</body>
</html> -->