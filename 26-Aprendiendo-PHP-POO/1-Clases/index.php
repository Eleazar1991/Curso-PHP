<?php
/*POO EN PHP*/
//Definicion de una clase
class Coche{
    //Atributos o propiedades (variables)
    public $color="Rojo";
    public $marca="Ferrari";
    public $modelo="F40";
    public $velocidad=300;
    public $caballaje=500;
    public $plaza=2;

    //Metodos (Funciones)
    public function getColor(){
        //$this -> Busca en esta clase una propiedad determinada
        return $this->color;
    }

    public function setColor($color){
        $this->color=$color;
    }

    public function acelerar(){
        $this->velocidad++;
    }

    public function frenar(){
        $this->velocidad--;
    }

    public function getVelocidad(){
        return $this->velocidad;
    }

    public function setModelo($modelo){
        $this->modelo=$modelo;
    }
}
//Fin definicion de la clase

//Crear objeto o instanciar la clase
$coche = new Coche();

//Usar los metodos
echo $coche->getVelocidad()."<br/>";

$coche->setColor("Amarillo");
echo "El color del coche es: ".$coche->color."<br/>";

$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
echo $coche->getVelocidad()."<br/>";
$coche->frenar();
echo $coche->getVelocidad()."<br/>";

$coche2= new Coche();
$coche2->setColor("Verde");
$coche2->setModelo("458");
var_dump($coche);
var_dump($coche2);
?>