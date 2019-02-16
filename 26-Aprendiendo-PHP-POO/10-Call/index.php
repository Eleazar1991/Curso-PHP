<?php
class Persona{
    private $nombre;
    private $edad;
    private $ciudad;

    public function __construct($nombre, $edad, $ciudad){
        $this->nombre=$nombre;
        $this->edad=$edad;
        $this->ciudad=$ciudad;
    }
    public function __call($name, $arguments){
        $prefix_metodo= substr($name,0,3);
        if($prefix_metodo == "get"){
            $nombre_metodo= substr(strtolower($name),3);
            if(!isset($this->$nombre_metodo)){
                return "El método que estas invocando no existe";
            }   
            
            //getter de todas las variables
            return $this->$nombre_metodo."<br>";
        }else{
            return "El método no existe";
        }
    }
}

$persona= new Persona("Eleazar",12,"Madrid");
echo $persona->getNombre();
echo $persona->getEdad();
echo $persona->getCiudad();
echo $persona->getHola();
?>