<?php
/*Conexion a la BD*/
require_once "../includes/conexion.php";
/*Iniciamos la sesion sino está creada*/
if(!isset($_SESSION)){
    session_start();
}
/*mysqli_real_scape_string ara scapar caracteres especiales como " ' como si fueran parte de la string a
la hora de insertarlos en la bd*/
$nombre=!empty($_POST['nombre-us']) ? mysqli_real_escape_string($conexiondb, $_POST['nombre-us']) : $_SESSION['usuario']['nombre'];
$apellidos=!empty($_POST['apellidos-us']) ? mysqli_real_escape_string($conexiondb, $_POST['apellidos-us']) : $_SESSION['usuario']['apellidos'];
$email=!empty($_POST['email-us']) ? mysqli_real_escape_string($conexiondb, trim($_POST['email-us'])) : $_SESSION['usuario']['email'];
$password=!empty($_POST['password-us']) ? mysqli_real_escape_string($conexiondb, $_POST['password-us']) : $_SESSION['usuario']['password'];

/*Array de errores*/
$errores= array();
/*Validamos los datos antes de guardarlos en la BD*/
/*nombre*/
if($nombre && !is_numeric($nombre) && !preg_match("/[0-9]/",$nombre)){
    $nombre_validado=true;
}else{
    $nombre_validado=false;
    $errores['nombre-us']= "El nombre no es valido";
}
/*apellidos*/
if($apellidos && !is_numeric($apellidos) && !preg_match("/[0-9]/",$apellidos)){
    $apellido_validado=true;
}else{
    $apellido_validado=false;
    $errores['apellidos-us']= "El apellido no es valido";
}
/*email*/
if($email && filter_var($email,FILTER_VALIDATE_EMAIL)){
    $email_validado=true;
}else{
    $email_validado=false;
    $errores['email-us']= "El email no es valido";
}
/*contraseña*/
if($password){
    $password_validado=true;
}else{
    $password_validado=false;
    $errores['password-us']= "La contraseña no es valida";
}
if((count($errores)==0)){
    /*Insertamos usuario en la BD sino hay errores y modificamos los cambios en $_SESSION*/
    $usuarioid=$_SESSION['usuario']['id'];
    /*Comprobamos que el email no este en la BD antes de modificar ya que tiene que ser unico*/
    $sql="SELECT * FROM usuarios WHERE email='$email'";
    $consulta= mysqli_query($conexiondb,$sql);
    $usuario=mysqli_fetch_assoc($consulta);
    /*Si el email existe en la BD no modificamos el campo*/
    if(!empty($usuario['email'])){
        /*Ciframos la contraseña en caso de que haya sido cambiada*/
        var_dump("El email existe en la BD");
        if($password===$_SESSION['usuario']['password']){
            $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', password='$password' WHERE id=$usuarioid;";
        }else{
            $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
            $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', password='$password_segura' WHERE id=$usuarioid;";
        }
        $_SESSION['completado']="La modificación de su perfil se ha completado con éxito, salvo el e-mail ya que hay una cuenta registrada a este";
    /*Si el email no existe en la BD modificamos el campo*/    
    }else{
        /*Ciframos la contraseña en caso de que haya sido cambiada*/
        if($password===$_SESSION['usuario']['password']){
            $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', email='$email', password='$password' WHERE id=$usuarioid;";
        }else{
            $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
            $sql="UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', email='$email', password='$password_segura' WHERE id=$usuarioid;";
        } 
        $_SESSION['completado']="La modificación de su perfil se ha completado con éxito";  
    }
    /*Actualizamos la BD*/
    $consulta= mysqli_query($conexiondb,$sql);
    if($consulta){
        $_SESSION['usuario']['nombre']=$nombre;
        $_SESSION['usuario']['apellidos']=$apellidos;
        $_SESSION['usuario']['email']=$email;
        if(!$password===$_SESSION['usuario']['password']){
            $_SESSION['usuario']['password']=$password_segura;
        } 
    }else{
        $_SESSION['errores']['general']="Fallo al modificar el usuario";
    }
}else{
    $_SESSION['errores']=$errores;
}
header("Location:../index.php");
var_dump($_SESSION);
?>