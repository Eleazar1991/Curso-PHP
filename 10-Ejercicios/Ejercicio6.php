<?php
//Realizar las tablas de multiplicar en una tabla HTML

echo "<table border='1'><tr>";
for($i=0;$i<11;$i++){
    echo "<th>La tabla del $i</th>";
}
echo "</tr><tr>";

for($i=0;$i<11;$i++){
    echo "<td>";
    for($j=0;$j<11;$j++){
        echo "$i x $j =".($i*$j)."</br>";
    }
    echo "</td>";
}
echo "</tr></table>";
?>