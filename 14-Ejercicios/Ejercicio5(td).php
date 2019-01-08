<?php
require "Ejercicio5(array).php";
for($j=1;$j<sizeof($array);$j++){
    echo "<tr>";
    for($i=0;$i<sizeof($array[0]);$i++){
        echo "<td>".$array[$j][$i]."</td>";
    }
    echo "</tr>";
}

?>