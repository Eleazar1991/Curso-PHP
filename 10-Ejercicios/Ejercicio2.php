<?php
//Mostrar numeros pares del 1 al 100

for($i=1;$i<101;$i++){
    if(($i%2)==0){
        echo $i;
        if ($i!=100){
            echo ', ';
        }       
    }
}

?>