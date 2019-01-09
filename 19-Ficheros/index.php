<?php  
//Abrir fichero
$archivo=fopen("fichero_texto.txt","a+");

//Leer archivo
while(!feof($archivo)){
    $contenido=fgets($archivo);
    echo $contenido."<br/>";
}

//Escribir archivo
fwrite($archivo,"\nYo soy texto escrito desde PHP");

//Leer archivo
while(!feof($archivo)){
    $contenido=fgets($archivo);
    echo $contenido."<br/>";
}


//Cerrar archivo
fclose($archivo);

?>