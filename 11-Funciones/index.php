<?php
//Ejemplo 1
function Imprimir(){
    echo "Eleazar Perez </br>";
    echo "Eleazar Perez </br>";
    echo "<hr/>";
}

Imprimir();
Imprimir();

//Ejemplo 2
function tabla($numero){
    var_dump($numero);
    echo "<h3>Tabla de multiplicar del numero $numero</h3>";
    for($i=1;$i<11;$i++){
        echo "$numero x $i = ".($numero*$i)."</br>";
    }
    echo "<hr/>";
}
tabla(1);
if (isset($_GET['numero'])){
    tabla($_GET['numero']);
}else{
    echo "Inserte numero por querystring </br>";
    echo "<hr/>";
}

//Ejemplo 3
function calculadora($numero1, $numero2){
    echo "Operaciones básicas con $numero1 y $numero2 </br>";
    echo "Suma: ".($numero1+$numero2)."</br>";
    echo "Resta: ".($numero1-$numero2)."</br>";
    echo "Multiplicacion: ".($numero1*$numero2)."</br>";
    echo "Division: ".($numero1/$numero2)."</br>";
    echo "<hr/>";
}

calculadora(1,2);
calculadora(3,4);

//Ejemplo 4
function calculadora2($numero1, $numero2,$negrita=false){
    $ristra="";
    if($negrita){
        $ristra.= "Operaciones básicas con $numero1 y $numero2 </br>";
        $ristra.="<h1>Suma: ".($numero1+$numero2)."</br>";
        $ristra.= "Resta: ".($numero1-$numero2)."</br>";
        $ristra.= "Multiplicacion: ".($numero1*$numero2)."</br>";
        $ristra.= "Division: ".($numero1/$numero2)."</br></h1>";
        $ristra.= "<hr/>";
    }else{
        $ristra.= "Operaciones básicas con $numero1 y $numero2 </br>";
        $ristra.= "Suma: ".($numero1+$numero2)."</br>";
        $ristra.= "Resta: ".($numero1-$numero2)."</br>";
        $ristra.= "Multiplicacion: ".($numero1*$numero2)."</br>";
        $ristra.= "Division: ".($numero1/$numero2)."</br>";
        $ristra.= "<hr/>";
    }
    return $ristra;
}

echo calculadora2(1,2,true);
echo calculadora2(3,4);


//Ejemplo 5
function devuelveElNombre($nombre){
    return "Mi nombre es $nombre";
}

echo devuelveElNombre("Eleazar Pérez");
echo "<hr/>";

//Ejemplo 6 
function devuelveElNombreCompleto($nombre, $apellidos){
    return devuelveElNombre($nombre)." ".$apellidos;
}
echo devuelveElNombreCompleto("Eleazar","Pérez");
?>