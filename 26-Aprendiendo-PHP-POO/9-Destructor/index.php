<?php
class Usuario{
    public $nombre;
    public $email;

    public function __construct(){
        $this->nombre="Eleazar";
        $this->email="eleazar@eleazar.com";
        //Nunca mostrar mensajes en el constructor esta prueba con fines de aprendizaje
        echo "Instancia del objeto creada"."<br>";
    }

    public function __destruct(){
        echo "Destruir el objeto";
    }

    public function __toString(){
        return "Hola $this->nombre, su email es $this->email <br>";
    }
}

$usuario= new Usuario();
var_dump($usuario);

echo $usuario;

?>