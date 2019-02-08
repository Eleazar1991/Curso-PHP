<?php
if(isset($_POST)){
    require_once "../includes/conexion.php";
    $titulo=isset($_POST['titulo-ent']) ? mysqli_real_escape_string($conexiondb, $_POST['titulo-ent']) : false;
    $descripcion=isset($_POST['desc-ent']) ? mysqli_real_escape_string($conexiondb, $_POST['desc-ent']) : false;
    $categoria=isset($_POST['cat-ent']) ? (int)$_POST['cat-ent'] : false;
    /*Array de errores*/
    $errores= array();
    /*Validamos los datos antes de guardarlos en la BD*/
    /*Recogemos el id de la entrada*/
    if(isset($_GET['id'])){
        $entradaid=$_GET['id'];
    }
    /*Obtenemos el id del usuario*/
        $usuarioid=$_SESSION['usuario']['id'];
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
    if($entradaid){
        if($categoria && is_numeric($categoria)){
            $categoria_validada=true;
            $sql="UPDATE entradas SET titulo='$titulo', descripcion='$descripcion', categoria_id='$categoria' WHERE id=$entradaid AND usuario_id=$usuarioid;";
        }else{
            $sql="UPDATE entradas SET titulo='$titulo', descripcion='$descripcion' WHERE id=$entradaid AND usuario_id=$usuarioid;";
        }
    }
    if(count($errores)==0){
        /*Insertamos usuario en la BD sino hay errores*/
        $usuario_id=$_SESSION['usuario']['id'];
        /*Insertamos en la BD*/
        $consulta= mysqli_query($conexiondb,$sql);
        if($consulta){
            $_SESSION['edit_completado']="La entrada se ha modificado con exito";
        }else{
            $_SESSION['errores']['edit_general']="Fallo al guardar la entrada";
        }
        header("Location:../index.php");
    }else{
        $_SESSION['errores']=$errores;
        header("Location:../editar-entrada.php?id=$entradaid");
    }
    var_dump($_SESSION);
}
?>