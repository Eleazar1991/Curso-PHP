<?php

if(!is_dir("mi_directorio")){
    //Crear directorio
    mkdir("mi_directorio",0777) or die("No se puede crear la carpeta");
}else{
    echo "La carpeta ya existe";
}

//Borrar directorio
rmdir("mi_directorio");
?>