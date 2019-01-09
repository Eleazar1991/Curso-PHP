<?php
$archivo= $_FILES['archivo'];
var_dump($archivo);
$nombre=$archivo['name'];
$tipo=$archivo['type'];

//Si el tipo del archivo es de cualquier tipo de imagen
if($tipo==="image/jpg" || $tipo==="image/png" || $tipo==="image/gif" || $tipo==="image/jpeg"){
    //Creo el directorio para guardar las imágenes
    if(!is_dir('images')){
        mkdir('images',0777);
    }
    //Guardo la image en el directorio y redirecciono al index.php
    move_uploaded_file($archivo['tmp_name'],'images/'.$nombre);
    header("Refresh: 5; URL=index.php");
    echo "<h1>Imagen $nombre subida correctamente</h1>";
}else{
    //Redireccion de 5 segundos a nuestro index.php
    header("Refresh: 5; URL=index.php");
    echo "<h1>Sube una imagen con un formato correcto (jpg,png,gif,jpeg)</h1>";
}


die()

?>