<?php
trait Utilidades{
    public function mostrarNombre(){
        echo "<h1>El nombre es: ".$this->nombre."</h1>";
    }
}

class Coche{
    public $nombre;
    public $modelo;
    use Utilidades;
}
class Persona{
    public $nombre;
    public $apellidos;
    use Utilidades;
}
class Videojuego{
    public $nombre;
    public $year;
    use Utilidades;
}

$coche=new Coche();
$persona= new Persona();
$videojuego= new Videojuego();

$coche->nombre="Fiat";
$coche->mostrarNombre();

$persona->nombre="Macario";
$persona->mostrarNombre();

$videojuego->nombre="PES";
$videojuego->mostrarNombre();
?>