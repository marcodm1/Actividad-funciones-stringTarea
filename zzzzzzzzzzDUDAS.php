
siempre que hacemos un prepare o bind param enviar

mysqli -> prepare()  devuelve un mysqli_stmt
->bind_param(...)
->bind_result(variables qeu recogen lso resultados);

comprobar que devulve filas:
- num_rows:
        mysqli:stm->store_result()
        mysql1_stm->num_rows()->SELECT
        mysql1_stm->affected_rows->INSERTE,DELETE...

- fetch:
        mysql1_stm->fetch():boolean->se puede comprobar que hay filas


$consulta = prepare....
$consulta->bind_result..
$consulta->store_result...
$consulta ->bind_result...


para usar const de otro objeto

objeto::PROPIEDAD sin ningun problema donde queramos

para usar una function desde otra dentro de un mismo objeto
con el $this->nombrefunction

guardar img desde el formulario
ENCTYPE="multipart/form-data"
comprobar el tamaño en php o n el formulario
$_FILE guarda la img 
is_upload_file