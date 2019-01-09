<?php
//Copiar fichero
copy("fichero_texto.txt","fichero_copiado.txt") or die("Error al copiar");

//Renombrar fichero
rename("fichero_copiado.txt","fichero_renombrado.txt");

//Eliminar fichero
unlink("fichero_renombrado.txt") or die("Error al eliminar");

if(file_exists("fichero_texto.txt")){
    echo "El fichero existe";
}
?>