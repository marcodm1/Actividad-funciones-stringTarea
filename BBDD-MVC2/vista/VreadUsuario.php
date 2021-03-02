<?php
    if (!isset($_COOKIE['id'])){
        require_once("../controlador/Clogearse.php");
    }

    if ( !isset($_POST['name']) || !isset($_POST['pagina']) ) {
        formularioRead(); 
    }else {
        require_once("./controlador/CreadUsuario.php");
    }
        
    function formularioRead(){
        ?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <label for="txtNombre">Nombre:</label>
                    <input type="text" name="name" id="txtNombre"><br><br>
                <label for="intPagina">Numero de pagina:</label>
                    <input type="number" name="pagina" id="intPagina"><br><br>
                
                <input type="submit" value="enviar">
            </form>
        <?php
    }
    


?>