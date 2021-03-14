<!-- 
                    tabla vacuna: 
    nombre | efectividad | fecha_caducidad | cantidad 
-->

<!-- 
                    tabla censo: les han vacunado o están disponibles para vacunación
        idPersona | nombre | apellidos | fecha_nacimiento | vacunada (true/false)
 -->

 <!-- 
                    tabla usuarios: 
    usuario | clave | perfil (el perfil puede ser de 1 o 2 (Administrador o Consulta))

  -->

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
        if (isset($_POST['nombre']) && isset($_POST['password']) && isset($_POST['perfil']) && isset($_POST['vacuna']) && isset($_POST['cantidad']) ) {
            $nombre      = $_POST['nombre'];
            $contrasenia = $_POST['password'];
            $pass        = password_hash($contrasenia, PASSWORD_DEFAULT);
            if (comprobarUsuario($nombre, $pass)) {
                // ok
            }else {
                // no ok
            }

            function comprobarUsuario($nombre, $password) {
                $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'pedro', '123');
                $consulta = $conexion->prepare("SELECT * from usuarios where nombre=:nombre and clave=:password");// quito contraseña
                $consulta->bindParam(":nombre",   $nombre); 
                $consulta->bindParam(":password", $password); 
                $consulta->execute();
                $resultado = $consulta->fetchAll(PDO::FETCH_CLASS); // fetch object convierte el resultado a un obj
                if (empty($resultado) ) {
                    return false;
                }else {
                    return true;
                }
            }

        } else {
            formulario();
        }

        function formulario() {
            ?>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <label for="txtNombre">Nombre usuario:</label>
                        <input type="text" name="nombre" id="txtNombre" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                    <label for="gg">Contraseña:</label>
                        <input type="password" name="password" id="gg" value="<?php if(isset($_POST['password'])){echo $_POST['password'];} ?>"><br><br>

                    <label for="intPerfil">Perfil</label>
                        <input type="number" name="perfil" id="intPerfil" value="<?php if(isset($_POST['perfil'])){echo $_POST['perfil'];} ?>"><br><br>

                    <?php   
                        $conexion = new PDO('mysql:host=localhost;dbname=dwes', 'pedro', '123');
                        $consulta = $conexion->prepare("SELECT * FROM vacuna WHERE  cantidad = 0");
                        $array    = $consulta->fetchAll(PDO::FETCH_CLASS); 
                        // $array con el FETCH_NUM   = un array de arrays estilo valor
                        // $array con el FETCH_ASSOC = un array de arrays estilo clave-valor
                        // $array con el FETCH_CLASS = un array de arrays estilo objeto
                    ?>
                    <label for="vacuna">Seleccione vacuna:</label>
                        <select name="vacuna[]" id="vacuna" form="carform">
                            <?php     
                                foreach ($array as $registro){
                                    ?> 
                                        <option value="<?php echo $registro->nombre?> " <?php if ($registro->nombre == $_POST['vacuna']){echo "selected";} ?>> <?php echo $registro->nombre ?></option>
                                    <?php
                                }
                            ?>
                        </select>

                    <label for="intCantidad">Cantidad vacunas</label>
                        <input type="number" name="cantidad" id="intCantidad" value="<?php if(isset($_POST['nombre'])){echo $_POST['nombre'];} ?>"><br><br>

                    <input type="submit" value="enviar">
                </form>
            <?php                   
        }
    ?>
    

</body>
</html>













