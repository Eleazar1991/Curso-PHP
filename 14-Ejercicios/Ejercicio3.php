<?php   
$variable="";
if(!empty($variable)){
    echo "La variable contiene texto inserte otra<br/>";
}else{
    $variable="Texto para el ejercicio";
    if(is_string($variable)){ 
        echo "<strong>".strtoupper($variable)."</strong></br>";
    }    
}
?>