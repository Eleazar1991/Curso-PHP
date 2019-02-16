<?php
class Usuario{
    const URL_COMPLETA="http://localhost";
    public $email;
    public $password;

    function getPassword(){
        return $this->password;
    }

    function setPassword($password){
        $this->password=$password;
    }

    function getemail(){
        return $this->email;
    }

    function setEmail($email){
        $this->email=$email;
    }
}

$usuario= new Usuario();
var_dump($usuario);
echo $usuario::URL_COMPLETA;



?>