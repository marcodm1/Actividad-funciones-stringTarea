<!DOCTYPE html>
<html lang="es">
<head>
    <title>Marco Domínguez</title>
    <meta charset="UTF-8">
    <meta name="author" content="Marco Dominguez">
    <meta name="description" content="ejercicioExamen">
</head>
    <body>
        <form action="formulario.php" method="post">
            <label  for="usuario">Usuario: </label>
                <input type="text" id="usuario" name="usuario" required> <br>
            <label  for="contrasenia">Contraseña: </label>
                <input type="text" id="contrasenia" name="contrasenia" required><br>
            <label  for="cliente">Cliente: </label>
                <input type="text" id="cliente" name="cliente" required><br>

            <select id="action" name="action" size="2">
                <option value="alta">Reactivar</option>
                <option value="baja">Dar baja </option>
            </select><br><br>

            <table>
                <tr>    
                    <th>ID       </th>
                    <th>Nombre   </th>
                    <th>Direccion</th>
                    <th>Alta     </th>
                    <th>Baja     </th>
                </tr>
            <?php
                require_once("conectaDb.php"); // usamos el otro archivo 
                $conectaDb = ConectaDb::getInstance();

                if(isset($_POST['action'])) { // si ha recibido el formulario...
                    $usuario        = $_POST['usuario'];
                    $contrasenia    = $_POST['contrasenia'];
                    $cliente        = $_POST['cliente'];

                    switch($_POST['action']){
                        case 'alta': $conectaDb->reactivar($cliente, $usuario, $contrasenia);
                            break;
                        case 'baja': $conectaDb->baja($cliente, $usuario, $contrasenia);
                            break;
                    }
                }
                $clientes = $conectaDb->obtenerClientes();
                foreach($clientes as $cliente) {
                    echo "<tr><td>$cliente->id</td><td>$cliente->nombre</td><td>$cliente->direccion</td><td>$cliente->fecha_alta</td><td>$cliente->fecha_baja</td></tr>";
                }
            ?>
            </table>
            <input type="submit" value="Enviar">
        </form>
    </body>
</html>


