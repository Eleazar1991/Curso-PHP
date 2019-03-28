<?php
require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        echo "Controlador Usuario Accion index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }
    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['name']) ? $_POST['name'] :false;
            $apellidos = isset($_POST['surname']) ? $_POST['surname'] :false;
            $email = isset($_POST['email']) ? $_POST['email'] :false;
            $password = isset($_POST['password']) ? $_POST['password'] :false;

            /*Array de errores*/
            $errores= array();  
            if($nombre && $apellidos && $email && $password){
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
                    $usuario=new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
                    $save=$usuario->save();
                    if($save){
                        $_SESSION['completado']="El registro se ha completado con exito";
                    }else{
                        $_SESSION['errores']['general']="Fallo al guardar el usuario";
                    }
                }else{
                    $_SESSION['errores']=$errores;
                }
            }else{
                $_SESSION['register']="Failed";
            }    
        }else{
            $_SESSION['register']="Failed";
        }
        header("Location:".base_url."usuario/registro");
    }
    public function login(){
        if(isset($_POST)){
            //Identificamos al usuario
            //Consulta a la BD
            $usuario=new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $identity=$usuario->login();

            if($identity && is_object($identity)){
                //Crear una sesion
                $_SESSION['identity']=$identity;
                if($identity->rol == 'admin'){
                    $_SESSION['admin']=true;
                }
                $_SESSION['complete_login']="Identificacion correcta";
            }else{
                $_SESSION['error_login']="Identificacion incorrecta";
            }

        }
        header("Location:".base_url);
    }
    public function logout(){
        if(isset($_SESSION['identity'])){
            $_SESSION['complete_logout']="Se ha cerrado sesión";
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            $_SESSION['complete_logout']="Se ha cerrado sesión";
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}

?>