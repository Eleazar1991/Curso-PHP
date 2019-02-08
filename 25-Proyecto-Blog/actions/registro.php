<?php
/*Comprobamos que todos los campos que nos llegan del formulario existen*/
if(isset($_POST['submit-reg'])){
    /*Conexion a la BD*/
    require_once "../includes/conexion.php";
    /*Iniciamos la sesion sino está creada*/
    if(!isset($_SESSION)){
        session_start();
    }
     /*mysqli_real_scape_string ara scapar caracteres especiales como " ' como si fueran parte de la string a
     la hora de insertarlos en la bd*/
    $nombre=isset($_POST['name']) ? mysqli_real_escape_string($conexiondb, $_POST['name']) : false;
    $apellidos=isset($_POST['surname']) ? mysqli_real_escape_string($conexiondb, $_POST['surname']) : false;
    $email=isset($_POST['email']) ? mysqli_real_escape_string($conexiondb, trim($_POST['email'])) : false;
    $password=isset($_POST['password']) ? mysqli_real_escape_string($conexiondb, $_POST['password']) : false;
    /*Array de errores*/
    $errores= array();
    /*Validamos los datos antes de guardarlos en la BD*/
    /*nombre*/
    if($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
        $nombre_validado=true;
    }else{
        $nombre_validado=false;
        $errores['nombre']= "El nombre no es valido";
    }
    /*apellidos*/
    if($apellidos && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
        $apellido_validado=true;
    }else{
        $apellido_validado=false;
        $errores['apellido']= "El apellido no es valido";
    }
    /*email*/
    if($email && filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validado=true;
    }else{
        $email_validado=false;
        $errores['email']= "El email no es valido";
    }
    /*contraseña*/
    if($password){
        $password_validado=true;
    }else{
        $password_validado=false;
        $errores['password']= "La contraseña no es valida";
    }
    
    if(count($errores)==0){
        /*Insertamos usuario en la BD sino hay errores*/
        /*Ciframos la contraseña*/
        $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
        
        /*Insertamos en la BD*/
        $sql="INSERT INTO usuarios VALUES(NULL,'$nombre','$apellidos','$email','$password_segura',CURDATE());";
        $consulta= mysqli_query($conexiondb,$sql);
        if($consulta){
            $_SESSION['completado']="El registro se ha completado con exito";
        }else{
            $_SESSION['errores']['general']="Fallo al guardar el usuario";
        }
    }else{
        $_SESSION['errores']=$errores;
    }
}
header("Location:../index.php");
?>