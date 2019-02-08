<?php
if(isset($_POST)){
    require_once "../includes/conexion.php";
    $nombre=isset($_POST['nombre-cat']) ? mysqli_real_escape_string($conexiondb, $_POST['nombre-cat']) : false;
    /*Array de errores*/
    $errores= array();
    /*Validamos los datos antes de guardarlos en la BD*/
    /*nombre*/
    if($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado=true;
    }else{
        $nombre_validado=false;
        $errores['nombre-cat']= "El nombre de la categoria no es valido";
    }

    if(count($errores)==0){
        /*Insertamos usuario en la BD sino hay errores*/
        
        /*Insertamos en la BD*/
        $sql="INSERT INTO categorias VALUES(NULL,'$nombre');";
        $consulta= mysqli_query($conexiondb,$sql);
        if($consulta){
            $_SESSION['completado']="La nueva categoría se ha almacenado con exito";
        }else{
            $_SESSION['errores']['general']="Fallo al guardar la nueva categoría";
        }
        header("Location:../index.php");
    }else{
        $_SESSION['errores']=$errores;
        var_dump($_SESSION);
        
        header("Location:../crear-categoria.php");
    }
}



?>