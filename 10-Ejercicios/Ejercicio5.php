<?php
//Mostrar todos los numeros comprendidos entre dos numeros

var_dump($_GET);
if(isset($_GET['numero1'])&&isset($_GET['numero2'])){
    $numero1=$_GET['numero1'];
    $numero2=$_GET['numero2'];
    for($i=(($numero1>$numero2)?$numero2:$numero1);$i<=(($numero1>$numero2)?$numero1:$numero2);$i++){
        echo $i;
        if($i!=(($numero1>$numero2)?$numero1:$numero2)){
            echo ", "; 
        }
    }
}else{
    echo "<h1>Introduzca los parametros por querystring</h1>";
}
?>