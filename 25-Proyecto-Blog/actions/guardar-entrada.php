<?php
if(isset($_POST)){
    require_once "../includes/conexion.php";
    $titulo=isset($_POST['titulo-ent']) ? mysqli_real_escape_string($conexiondb, $_POST['titulo-ent']) : false;
    $descripcion=isset($_POST['desc-ent']) ? mysqli_real_escape_string($conexiondb, $_POST['desc-ent']) : false;
    $categoria=isset($_POST['cat-ent']) ? (int)$_POST['cat-ent'] : false;
    /*Array de errores*/
    $errores= array();
    /*Validamos los datos antes de guardarlos en la BD*/
    /*título*/
    if($titulo){
        $titulo_validado=true;
    }else{
        $titulo_validado=false;
        $errores['titulo-ent']= "Inserte un titulo";
    }
    /*descripcion*/
    if($descripcion){
        $descripcion_validada=true;
    }else{
        $descripcion_validada=false;
        $errores['desc-ent']= "Inserte una descripción";
    }
    /*categorias*/
    if($categoria && is_numeric($categoria)){
        $categoria_validada=true;
    }else{
        $categoria_validada=false;
        $errores['cat-ent']= "La categoria no es valida";
    }
    if(count($errores)==0){
        /*Insertamos usuario en la BD sino hay errores*/
        $usuario_id=$_SESSION['usuario']['id'];
        /*Insertamos en la BD*/
        $sql="INSERT INTO entradas VALUES(NULL,'$usuario_id','$categoria','$titulo','$descripcion',CURDATE());";
        $consulta= mysqli_query($conexiondb,$sql);
        if($consulta){
            $_SESSION['completado']="La nueva entrada se ha almacenado con exito";
        }else{
            $_SESSION['errores']['general']="Fallo al guardar la nueva entrada";
        }
        header("Location:../index.php");
    }else{
        $_SESSION['errores']=$errores;
        header("Location:../crear-entrada.php");
    }
}



?>