<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Marco Domínguez</title>
		<meta charset="UTF-8">
        <meta name="author"      content="Marco Dominguez">
        <meta name="description" content="Ejercicio cookie">
        
	</head>
	<body>
        
    <?php 
           echo "Lo vemos con PHP: <br>";
           if (!empty($_COOKIE['cookieHttponly'])){
               mostrarCookies();
           }else {
               echo "No hay cookie (cookieHttponly) creadas <br>";
           }

           function mostrarCookies(){
               foreach ($_COOKIE as $clave => $valor){
                   echo "$clave => $valor  <br>";
               }
           }
       
        ?>
        
        
        
 
        <script>
            document.write("<br>Lo vemos con JavaScript: <br>");

            document.write(verCookie('cookieHttponly'));

            function verCookie(cookieHttponly) {
                var nombre   = cookieHttponly + "=";
                var depurado = decodeURIComponent(document.cookie); 
                var ca       = depurado.split(';');

                for (var i=0; i<ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                    }
                    if (c.indexOf(nombre) == 0) {
                        return c.substring(nombre.length, c.length);
                    }
                }
                return "";
            }

        </script>
        <br><a href="menu.php"> Volver la menu.</a><br>
 
    </body>
</html>