<!-- __________________________ preguntar por esto _______________________ -->
<?php  
    if ( $_POST['tipo'] != "") {
        $tipo_value = $_POST['tipo'];
    }  
    if ($tipo_value == "menor") {
        $cselect1 = "checked"; 
        $cselect2 = ""; 
        $cselect3 = "";
    }elseif ($tipo_value == "mayor") {
        $cselect1 = ""; 
        $cselect2 = "checked"; 
        $cselect3 = "";
    }elseif ($tipo_value == "medio") {
        $cselect1 = ""; 
        $cselect2 = ""; 
        $cselect3 = "checked";
    }  
?>             
              
<input name="tipo" value="menor" type="radio" <?=$cselect1?>>   
    <div>Menor</div><br>  
<input name="tipo" value="mayor" type="radio" <?=$cselect2?>>   
    <div>Mayor</div><br>  
<input name="tipo" value="medio" type="radio" <?=$cselect3?>>   
    <div>Medio</div>





<select name="destinos[]" size=8 multiple>  
<?php  
if(!emptyempty($_POST[destinos])){  
    $activo = 1;  
}  
function preselect($pais,$activo){  
    if($activo == 1){  
        foreach($_POST[destinos] as $value){  
            if($value == $pais){  
                echo "selected";  
            }else{  
                echo "";  
            }  
        }  
    }  
}  
?>  
<option value="ABJASIA" <?=preselect('ABJASIA',$activo)?>>Abjasia</option>  
<option value="ACROTIRI Y DHEKELIA" <?=preselect('ACROTIRI Y DHEKELIA',$activo)?>>Acrotiri y Dhekelia</option>  
<option value="AFGANISTAN" <?=preselect('AFGANISTAN',$activo)?>>Afganistán</option>  
<option value="ALAND" <?=preselect('ALAND',$activo)?>>Åland</option>  
<option value="ALBANIA" <?=preselect('ALBANIA',$activo)?>>Albania</option>  
<option value="ALEMANIA" <?=preselect('ALEMANIA',$activo)?>>Alemania</option>  
<option value="ANDORRA" <?=preselect('ANDORRA',$activo)?>>Andorra</option>  
<option value="ANGOLA" <?=preselect('ANGOLA',$activo)?>>Angola</option>  
<option value="ANGUILA" <?=preselect('ANGUILA',$activo)?>>Anguila</option>  
<option value="ANTIGUA Y BARBUDA" <?=preselect('ANTIGUA Y BARBUDA',$activo)?>>Antigua y Barbuda</option>  
<option value="ANTILLAS NEERLANDESAS" <?=preselect('ANTILLAS NEERLANDESAS',$activo)?>>Antillas Neerlandesas</option>  
<option value="ARABIA SAUDITA" <?=preselect('ARABIA SAUDITA',$activo)?>>Arabia Saudita</option>  
<option value="ARGELIA" <?=preselect('ARGELIA',$activo)?>>Argelia</option>  
<option value="ARGENTINA" <?=preselect('ARGENTINA',$activo)?>>Argentina</option>  
<option value="ARMENIA" <?=preselect('ARMENIA',$activo)?>>Armenia</option>  
<option value="ARUBA" <?=preselect('ARUBA',$activo)?>>Aruba</option>  
<option value="ISLA ASCENSION" <?=preselect('ISLA ASCENSION',$activo)?>>Isla Ascensión</option>  
<option value="AUSTRALIA" <?=preselect('AUSTRALIA',$activo)?>>Australia</option>  
<option value="AUSTRIA" <?=preselect('AUSTRIA',$activo)?>>Austria</option> 