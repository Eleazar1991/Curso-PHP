<?php
/*POO EN PHP*/
//Definicion de una clase
class Coche{
    //Atributos o propiedades (variables)
    public $color; //Se puede acceder desde cualquier lugar a esta propiedad
    protected $marca; //Se puede acceder a ellos desde la clase que los define
                      // y desde clases que hereden esta clase  
    private $modelo;  //Unicamente se puede acceder desde la clase


    public $velocidad;
    public $caballaje;
    public $plazas;

    //Metodos (Funciones)
    //Constructor
    // public function __construct(){
    //     $this->color="Rojo";
    //     $this->marca="Ferrari";
    //     $this->modelo="F40";
    //     $this->velocidad=300;
    //     $this->caballaje=500;
    //     $this->plazas=2;
    // }
    //Constructor para introducirle los datos
    public function __construct($color,$marca,$modelo,$velocidad,$caballaje,$plazas){
        $this->color=$color;
        $this->marca=$marca;
        $this->modelo=$modelo;
        $this->velocidad=$velocidad;
        $this->caballaje=$caballaje;
        $this->plazas=$plazas;
    }

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

    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo=$modelo;
    }

    public function setMarca($marca){
        $this->marca=$marca;
    }
    
    public function mostrarInfo(Coche $coche){
        if (is_object($coche)){
            $informacion="
            <h1>Informacion del coche</h1>
            Color: $coche->color </br>
            Modelo: $coche->modelo </br>
            Velocidad: $coche->velocidad </br>
            ";
        }else{
            $informacion="Tu dato es este: $coche";
        }
        return $informacion;
    }
}
?>