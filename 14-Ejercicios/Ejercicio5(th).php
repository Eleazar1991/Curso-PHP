<?php
require "Ejercicio5(array).php";

echo "<tr>";
for($i=0;$i<sizeof($array[0]);$i++){
    echo "<th>".$array[0][$i]."</th>";
}
echo "</tr>";
?>