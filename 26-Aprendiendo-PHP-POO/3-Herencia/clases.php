<?php
class Persona{
    public $nombre;
    public $apellido;
    public $altura;
    public $edad;

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function getAltura(){
        return $this->altura;
    }

    public function setAltura($altura){
        $this->altura=$altura;
    }
    public function getEdad(){
        return $this->edad;
    }

    public function setEdad($edad){
        $this->edad=$edad;
    }

    public function hablar(){
        return "Estoy hablando";
    }

    public function caminar(){
        return "Estoy caminando";
    }
}

class Informatico extends Persona {
    public $lenguajes;
    public $experiencia;
    public function __construct(){
        $this->lenguajes="HTML, CSS, JS";
        $this->experiencia=10;
    }
    public function sabeLenguajes($lenguajes){
        $this->lenguajes=$lenguajes;
        return $this->lenguajes;
    }
    public function programar(){
        return "Soy programador";
    }

    public function repararOrdenador(){
        return "Reparar Ordenadores";
    }


}
class TecnicoRedes extends Informatico{
    public $auditarRedes;

    public function __construct(){
        $this->auditarRedes="Experto";
        parent::__construct();
    }

    public function auditoria(){
       return "Estoy auditando una red"; 
    }
}

?>