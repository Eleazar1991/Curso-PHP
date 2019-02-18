<?php
require_once 'ModeloBase.php';
class Usuario extends ModeloBase{
    public $nombre;
    public $apellidos;
    public $email;
    public $password;

    public function __construct(){
        parent::__construct();
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }

    public function getApellidos(){
        return $this->apellidos;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }

    public function getEmail(){
        return $this->email;
    }
    public function setEmail($email){
        $this->email=$email;
    }

    public function getPassword(){
        return $this->password;
    }
    public function setPassword($password){
        $this->password=$password;
    }

}



?>