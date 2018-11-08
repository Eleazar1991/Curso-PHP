<?php
$numero1=55;
$numero2=33;

//Operadores Aritmeticos
echo "suma: ".($numero1+$numero2)."<br>";
echo "resta: ".($numero1-$numero2)."<br>";
echo "multiplicacion: ".($numero1*$numero2)."<br>";
echo "division: ".($numero1/$numero2)."<br>";
echo "resto: ".($numero1%$numero2)."<br>";


//Operadores Incremento y Decremento
$numero3=2019;
echo "<h1>".++$numero3."</h1>";
$numero3=2019;
echo "<h1>".--$numero3."</h1>";

//Operadores de asignacion
$numero4=55;
echo $numero4."<br>";
echo ($numero4+=5)."<br>";
$numero4=55;
echo ($numero4-=5)."<br>";
$numero4=55;
echo ($numero4*=5)."<br>";
$numero4=55;
echo ($numero4/=5)."<br>";
?>