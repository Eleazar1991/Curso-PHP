<?php

if(isset($_POST['submit-log'])){
    /*Conexion a la BD e iniciar la sesion*/
    require_once "../includes/conexion.php";
     /*Cogemos los datos del formulario*/
    $email=isset($_POST['email']) ? trim($_POST['email']) : false;
    $password=isset($_POST['password']) ? $_POST['password'] : false;

    /*Errores*/
    $errores=array();
    /*Consulta para comprobar las credenciales del usuario*/
    $sql="SELECT * FROM usuarios WHERE email='$email' LIMIT 1;";
    $consulta= mysqli_query($conexiondb,$sql);


    if($consulta && mysqli_num_rows($consulta)==1){
        /*contraseña*/ 
        $usuario=mysqli_fetch_assoc($consulta);
        if(password_verify($password,$usuario['password'])){
            /*Se ha identificado correctamente*/
            $_SESSION['usuario']=$usuario;
            if(isset($_SESSION['error_login'])){
                session_unset();
            }
        }else{
            $errores['login-password']="Contraseña incorrecta";
        }
    }else{
        /*Mensaje de Error*/
        $errores['login-email']="Email incorrecto";
    }
    $_SESSION['errores']=$errores;
}
header("Location:../index.php");



?>
